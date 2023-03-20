<?php
//  Hace la conexion con la base de datos     
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $base_de_datos = "registro";

    $mysqli = new mysqli($servidor, $usuario, $password, $base_de_datos);

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>