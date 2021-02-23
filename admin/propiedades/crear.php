<?php 

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar DB para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);
    
   /* echo "<pre>";
    var_dump(mysqli_fetch_assoc($resultado));
    echo "</pre>";*/
    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado = date('Y/m/d');

    //Ejecutar el codigo despues de que el usuario envía el formulario
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
       /* echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];

        //Validando campos vacios
        if (!$titulo) {
            $errores[] = "Debes añadir un título obligatoriamente";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio obligatoriamente";
        }
        if (strlen($descripcion) < 50) {
            $errores[] = "La descripción es obligatoria y debe tener como mínimo 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errores[] = "El número de baños es obligatorio";
        }
        if (!$estacionamiento) {
            $errores[] = "El número de estacionamientos es obligatorio";
        }
        if (!$vendedorId) {
            $errores[] = "Debes elegir un vendedor obligatoriamente";
        }

        /*echo "<pre>";
        var_dump($errores);
        echo "</pre>";*/

        //Revisar que el arreglo de errores esté vacío para que se inserten los datos
        if (empty($errores)) {
             //Insertar en la DB
            $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,creado,vendedorId) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";
            //echo $query;
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                //Redireccionar al usuario para evitar que presionen muchas veces el boton 'Crear Propiedad'
                header('Location: /admin'); //header solamente funciona si NO HAY nada de HTML previo
            }
        }
   
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
       
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div> 
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png"> 

                <label for="descripcion">Descripcion: </label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones: </label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Cantidad de Habitaciones" min="1" max="9" value="<?php echo $habitaciones; ?>">
            
                <label for="wc">Baños: </label>
                <input type="number" id="wc" name="wc" placeholder="Cantidad de Baños" min="1" max="9" value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamientos: </label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Cantidad de Estacionamientos" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione vendedor--</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)):  //Le pone : para evitar poner las llaves del while y solo poner endwhile?> 
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                    <?php endwhile ;?>
                        
                    
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

        <a href="/admin" class="boton boton-verde">Volver</a>
    </main>

<?php 
    incluirTemplate('footer');
?>