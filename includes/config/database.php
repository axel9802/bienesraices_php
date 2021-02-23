<?php

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'ydaleu11', 'bienes_raices');

    if (!$db) {
        echo 'Error, No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
} 