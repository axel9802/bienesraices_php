<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    //Si no existe el usuario se va redirigir
    if (!$auth) {
        header('Location: /');
    }

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

    //Ejecutar el codigo despues de que el usuario envía el formulario
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        echo "<pre>";
        var_dump($_FILES);//Para imagenes
        echo "</pre>";
        exit;*/
        //Si alguien coloca codigo sql esta funcion va deshabilitarlo y guardarlo como entidad en la DB para que no sea ejecutable
        $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
        $precio = mysqli_real_escape_string($db,$_POST['precio']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db,$_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db,$_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

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
        if (!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        }
        //Validar por tamaño para la imagen (1MB máximo)
            //Primero convertir de bytes a MB
            $medida = 1000*1000;
        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada (Máximo 1MB)";
        }

        /*echo "<pre>";
        var_dump($errores);
        echo "</pre>";*/

        //Revisar que el arreglo de errores esté vacío para que se inserten los datos
        if (empty($errores)) {

            /**Subida de archivos**/
            //Crear carpeta en la raiz del proyecto
            $carpetaImagenes = '../../imagenes/';

            //is_dir nos retorna si una carpeta existe o no
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);//mkdir es una funcion para crear la carpeta en esa direccion
            }
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true));



            //Subir la imagen -> Mueve la imagen de tmp_name hacia carpetaimagenes con su respectivo nombre de archivo
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg");

             //Insertar en la DB
            $query = "INSERT INTO propiedades (titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedorId) VALUES ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";
            //echo $query;
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                //Redireccionar al usuario para evitar que presionen muchas veces el boton 'Crear Propiedad'
                    //header solamente funciona si NO HAY nada de HTML previo
                    //Despues del ? va el query string (url con parametros)
                header('Location: /admin?resultado=1'); 
            }
        }
   
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
       
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div> 
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen"> 

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