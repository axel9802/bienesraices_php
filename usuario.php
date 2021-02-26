<?php

//1.Importar la conexión

require 'includes/config/database.php';
$db = conectarDB();

//2.Crear un email y un password

$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);  //Todos los passwords Hasheados van a tener 60 caracteres char(60)

//3.Query para crear el usuario

$query = "INSERT INTO usuarios (email, password) values ('${email}', '${passwordHash}')";
    //echo $query;

//4.Agregarlo a la DB

mysqli_query($db, $query);