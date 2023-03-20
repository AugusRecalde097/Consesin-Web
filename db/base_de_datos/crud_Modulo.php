<?php 
//Se autoinicia una sesión
session_start();
//conexion con la base de datos
require("../base_de_datos/sql_conection.php");


// Datos del proyecto
$Nombre = (isset($_POST['Nombre_Modulo']))? $_POST['Nombre_Modulo'] : "";
$Descripcion = (isset($_POST['Descripcion']))? $_POST['Descripcion'] : "";
$Sistema = (isset($_POST['Sistema']))? $_POST['Sistema'] : "";
$Estado = (isset($_POST['Estado']))? $_POST['Estado'] : "";

$ID_Modulo = "";

if(isset($_POST['Nombre_Modulo']))

if ($_POST['action'] != 'insert'){
    $ID_Modulo = $_GET["id"];
}

// Validaciones

if (isset($_POST['action'])) {

    if ($ID_Modulo == "") {
        // insert (Inserta los datos de Modulo)
        $agregar = "INSERT INTO modulo (Nombre_Modulo, Descripcion, Sistema, Estado) VALUES ('$Nombre', '$Descripcion','$Sistema', '$Estado')";
        $resultado = $mysqli->query($agregar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Agrego con exito el Modulo!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
    } else {
        // update (Modifica los datos de Modulo)
        $actualizar = "UPDATE modulo SET
                                Nombre_Modulo = '$Nombre', 
                                Descripcion = '$Descripcion', 
                                Sistema = '$Sistema', 
                                Estado = '$Estado'
                       WHERE ID_Modulo =  $ID_Modulo";

        $resultado = $mysqli->query($actualizar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Modifico con exito el Modulo!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
    }
} else {
    // delete (Elimina los datos de Modulo)
    
    $eliminar= "DELETE FROM modulo Where ID_Modulo = $ID_Modulo";
    $resultado=$mysqli->query($eliminar);
    echo '
        <script>
            alert ("¡Se Elimino con exito el Modulo!");
            window.location = "../pantallas/datosProyecto.php";
        </script>
        ';
}

?>