<?php 
    //1.Importar la conexión DB
    require 'includes/config/database.php'; //Esta ruta es relativa como si estuviera en index.php o anuncios.php general
    $db = conectarDB();

    //2.Consultar DB
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //3.Obtener Resultados
    $resultado = mysqli_query($db, $query);

?>



<div class="contenedor-anuncios">
            <?php while ($propiedad = mysqli_fetch_assoc($resultado)): ?>

            <div class="anuncio">

                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] . '.jpg'; ?>" alt="Anuncio">   

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
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
                    <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--Contenido anuncio finalizado-->
            </div><!--anuncio finalizado-->
            <?php endwhile; ?>
        </div><!--Contenedor-anuncios finalizado-->

<?php
    //4.Cerrar conexión de la DB
    mysqli_close($db);
?>