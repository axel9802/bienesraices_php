<?php 

    session_start();
    // echo "<pre>";
    // var_dump ($_SESSION); 
    // echo "</pre>";

    //Si existe el usuario entonces SI esta autenticado
    $auth = $_SESSION['login'];

    //Si no existe el usuario se va redirigir
    if (!$auth) {
        header('Location: /');
    }

    //1.Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();

    //2.Escribir la query
    $query = "SELECT * FROM propiedades";
    //3.Consultar la DB
    $resultadoConsulta = mysqli_query($db, $query);
    

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null; // Lo que hace ?? es que si no existe el valor de resultado le asigna null

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {

            //Eliminar archivo
            $query = "SELECT imagen FROM propiedades where  id = ${id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $propiedad['imagen'] . '.jpg');
            

            //Eliminar propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";    
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /admin?resultado=3');
            }
        }
    }
    
    //Incluye un template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if (intval($resultado) === 1): ?> 
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif (intval($resultado) === 2): ?> 
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif (intval($resultado) === 3): ?> 
            <p class="alerta error">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>
        

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--4.Mostrar los resultados-->
                <?php  
                    //Codigo para iterar en la DB
                    while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo']; ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php 

    //5.Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>