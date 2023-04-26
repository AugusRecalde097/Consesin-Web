<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
//  Hace la conexion con la base de datos     
    $servidor = $_ENV['db_servidor'];
    $usuario = $_ENV['db_usuario'];
    $password = $_ENV['db_password'];
    $base_de_datos = $_ENV['db_base_de_datos'];

    $mysqli = new mysqli($servidor, $usuario, $password, $base_de_datos);

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>