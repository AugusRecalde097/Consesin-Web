<?php
//Se autoinicia una sesión
    session_start();
//conexion con la base de datos
    require "../base_de_datos/sql_conection.php";
//selecciona y pregunta 
    $id_modulo = $_GET["id"];
    $modulo_sql = "SELECT * FROM proyecto WHERE ID_Modulo = $id_modulo";
    $modulo_resultado = $mysqli->query($modulo_sql);

// Si el módulo está relacionado a un proyecto no se le deja eliminar.
    if ($modulo_resultado->{"num_rows"} > 0) {
//Si no se elimina respondemos con un mensaje de error.
    echo '
    <script>
        alert ("No se puede eliminar porque tiene relacionado un proyecto. Verifique.");
        window.location = "../pantallas/datosProyecto.php";
    </script>
    ';
    } else {

        $eliminar = "DELETE FROM modulo Where ID_Modulo = $id_modulo";
        $resultado=$mysqli->query($eliminar);
// Si no está relacionado, se puede eliminar el registro.
        echo '
        <script>
            alert ("¡Se Elimino con exito el Modulo!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
    }
?>