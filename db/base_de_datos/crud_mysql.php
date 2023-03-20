<?php
//Se autoinicia una sesión
session_start();
//conexion con la base de datos
require("../base_de_datos/sql_conection.php");


// Datos de la persona
$Nombre = (isset($_POST['Nombre']))? $_POST['Nombre'] : "";
$Apellido = (isset($_POST['Apellido']))? $_POST['Apellido'] : "";
$F_Nacimiento = (isset($_POST['F_Nacimiento']))? $_POST['F_Nacimiento'] : "";
$DNI = (isset($_POST['DNI']))? $_POST['DNI'] : "";
$Sexo = (isset($_POST['Sexo']))? $_POST['Sexo'] : "";



$ID_Persona = "";

if(isset($_POST['Nombre']))

if ($_POST['action'] != 'insert'){
    $ID_Persona = $_GET["id"];
}
// Validaciones


if (isset($_POST['action'])) {

    if ($ID_Persona == "") {
        // insert (Insertar los datos de Persona)
        $agregar = "INSERT INTO persona (Nombre, Apellido, F_Nacimiento, DNI, Sexo) VALUES ('$Nombre', '$Apellido', '$F_Nacimiento', $DNI, '$Sexo')";
        $resultado = $mysqli->query($agregar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Agrego con exito el Registro!");
            window.location = "../pantallas/datos_programador.php";
        </script>
        ';
    } else {
        // update (Modifica  los datos de Persona)
        $actualizar = "UPDATE persona SET
                       Nombre = '$Nombre', Apellido = '$Apellido', F_Nacimiento = '$F_Nacimiento', DNI = '$DNI', Sexo = '$Sexo'
                       WHERE ID_Persona =  $ID_Persona";
        $resultado = $mysqli->query($actualizar) or die ($mysqli->error);
        echo '
        <script>
            alert ("¡Se Modifico con exito el Registro!");
            window.location = "../pantallas/datos_programador.php";
        </script>
        ';
    }
} else {
    // delete (Elimina los datos de la Persona)
    
    $eliminar= "DELETE FROM persona Where ID_Persona = $ID_Persona";
    $resultado=$mysqli->query($eliminar);
    echo '
        <script>
            alert ("¡Se Elimino con exito el Registro!");
            window.location = "../pantallas/datos_programador.php";
        </script>
        ';
}

?>