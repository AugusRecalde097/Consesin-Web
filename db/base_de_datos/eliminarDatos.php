<?php
    
    session_start();
//conexion con la base de datos
    require "../base_de_datos/sql_conection.php";
//selecciona y pregunta 
	$id_persona=$_GET["id"];
    $eliminar_sql = "SELECT * FROM proyecto WHERE ID_Persona = $id_persona";
    $resultado=$mysqli->query($eliminar_sql);

// Si el módulo está relacionado a un proyecto no se le deja eliminar.
    if ($resultado->{"num_rows"} > 0) {
        //Si no se elimina respondemos con un mensaje de error.
        echo '
            <script>
                alert ("No se puede eliminar porque tiene relacionado un proyecto. Verifique.");
                window.location = "../pantallas/datos_programador.php";
            </script>
            ';
    } else {
        $eliminar = "DELETE FROM persona WHERE ID_Persona = $id_persona";
        $resultado=$mysqli->query($eliminar);
// Si no está relacionado, se puede eliminar el registro.
        echo '
        <script>
            alert ("¡Se Elimino con exito el Registro!");
            window.location = "../pantallas/datos_programador.php";
        </script>
        ';
    }
?>