<?php 
//Se autoinicia una sesión
session_start();
//conexion con la base de datos
require("../base_de_datos/sql_conection.php");


// Datos del proyecto
$ID_Modulo = (isset($_POST['ID_Modulo']))? $_POST['ID_Modulo'] : "";
$ID_Persona = (isset($_POST['ID_Persona']))? $_POST['ID_Persona'] : "";

$ID_Proyecto = "";

if(isset($_POST['ID_Modulo']))

if ($_POST['action'] != 'insert'){
    $ID_Proyecto = $_GET["id"];
}

// Validaciones

if (isset($_POST['action'])) {

    if ($ID_Proyecto == "") {
        // insert (Inserta los datos de Proyecto)
        $agregar = "INSERT INTO proyecto (ID_Modulo, ID_Persona) VALUES ('$ID_Modulo', '$ID_Persona')";
        $resultado = $mysqli->query($agregar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Agrego con exito el Proyecto!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
    } else {
        // update (Modifica los datos de Proyecto)
        $actualizar = "UPDATE proyecto SET
                                ID_Modulo = '$ID_Modulo', 
                                ID_Persona = '$ID_Persona', 
                        WHERE ID_Proyecto =  $ID_Proyecto";

        $resultado = $mysqli->query($actualizar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Modifico con exito el Proyecto!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
    }
} else {
    // delete (Elimina los datos de Proyecto)
    
    $eliminar= "DELETE FROM proyecto Where ID_Proyecto = $ID_Proyecto";
    $resultado=$mysqli->query($eliminar);
    echo '
        <script>
            alert ("¡Se Elimino con exito el Proyecto!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
}


?>