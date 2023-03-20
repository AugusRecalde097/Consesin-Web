<?php
//conexion con la base de datos
    require ("../base_de_datos/sql_conection.php");
//Se autoinicia una sesión
    session_start();


//print_r($_POST);
    $Nombre_Modulo = $_POST['Nombre_Modulo'];
    $Descripcion = $_POST['Descripcion'];
    $Sistema = $_POST['Sistema'];
    $Estado = $_POST['Estado'];

//Inserta los datos 
    $agregar = "INSERT INTO modulo (Nombre_Modulo, Descripcion, Sistema, Estado) VALUES ('$Nombre_Modulo', '$Descripcion', '$Sistema', '$Estado')";
    $resultado = $mysqli->query($agregar) or die ($mysqli->error);
    echo '
    <script>
        alert ("¡Se agrego correctamente el Modulo!");
        window.location = "../pantallas/datosProyecto.php";
    </script>
    ';
?>