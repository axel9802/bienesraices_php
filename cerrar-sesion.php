<?php

session_start();

$_SESSION = []; //Reiniciar el arreglo de sesión a un arreglo vacío. Para asi cerrar la sesión

header('Location: /');