<?php
//Se autoinicia una sesión
    session_start();
//conexion con la base de datos
    require "../base_de_datos/sql_conection.php";
	$programador=$_GET["id"];
//Elimina
    $eliminar= "DELETE FROM proyecto Where ID_Proyecto = $programador";
    $resultado=$mysqli->query($eliminar);
    echo '
    <script>
        alert ("¡Se Elimino con exito el Proyecto!");
        window.location = "../pantallas/datosProyecto.php";
    </script>
    ';
?>