<?php
//Se autoinicia una sesión
session_start();
//conexion con la base de datos
require ("../base_de_datos/sql_conection.php");

//print_r($_POST);
    $ID_Modulo = $_POST['ID_Modulo'];
    $ID_Persona = $_POST['ID_Persona'];

//Inserta los datos 
    $agregar = "INSERT INTO proyecto (ID_Modulo, ID_Persona) VALUES ('$ID_Modulo', '$ID_Persona')";
    $resultado = $mysqli->query($agregar) or die ($mysqli->error);
    echo '
    <script>
        alert ("¡Se agrego correctamente el Proyecto!");
        window.location = "../pantallas/datosProyecto.php";
    </script>
    ';
?>