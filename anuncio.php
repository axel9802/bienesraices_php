<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /');
    }

    //1.Importar la DB
    require 'includes/config/database.php';
    $db = conectarDB();

    //2.Consultar la DB
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    //3.Obtener resultado
    $resultado = mysqli_query($db, $query);

    //Resultado es un objeto y se accede a sus propiedades con flecha(->)
    //num_rows es 0 cuando no existe el registro id
    if ($resultado->num_rows === 0) {
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

            <img loading=lazy src="/imagenes/<?php echo $propiedad['imagen'] . '.jpg'; ?>" alt="Imagen Destacada">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <?php echo $propiedad['descripcion']; ?>
        </div>
    </main>

<?php 
    //4.Cerrar la conexión
    mysqli_close($db);
    incluirTemplate('footer');
?>