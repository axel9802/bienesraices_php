<?php 

    //Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();


    //Autenticar el usuario

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump ($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)); 
        $password = mysqli_real_escape_string($db,  $_POST['password']); 

        if (!$email) {
            $errores[] = "El email es obligatorio o no es válido";
        }
        if (!$password) {
            $errores[] = "El password es obligatorio";
        }
        if (empty($errores)) {

            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            //Para saber si un registro existe o no
            if ($resultado->num_rows) {
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                
                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);
                
                if ($auth) {

                    //Si auth es true, el usuario está autenticado
                    //Iniciar Session para poder acceder a la super global $_SESSION
                    session_start();

                    //Llenar el arreglo de la sesion
                    //$_SESSION va mantener la sesion activa del usuario. PERO PRIMERO SE DEBE PONER SESION_START() para tener acceso a ella
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                } else {
                   $errores[] = "El password es incorrecto"; 
                }
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error): ?>
        
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <form method="POST" action="" class="formulario">
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Teléfono</label>
                <input name="email" type="email" placeholder="Tu Email" id="email" required>
                
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Tu Password" required>    
        </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>