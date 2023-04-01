<?php 
//envia el encabezado
header('Content-type: application/json');

require ('../vendor/autoload.php');
include 'connect.php';

// print_r($_POST);exit;

$conse01_nombre = $_POST['nombre_persona'];
$conse01_apellido = $_POST['apellido_persona'];
$conse01_fnacimiento = $_POST['fnacimiento_persona'];
$conse01_sexo = $_POST['sexo_persona'];
$CONSE06_MAIL = $_POST["mail_persona"];
$CONSE06_PASS = $_POST["pass_persona"];

//Enviamos respuesta.-
$pass_fuerte = password_hash($CONSE06_PASS, PASSWORD_BCRYPT,[19]);
//Inserta los datos 
$insertar_persona = "INSERT INTO conse_01_persona (conse01_nombre, conse01_apellido, conse01_sexo, conse01_fnacimiento) 
VALUES ('$conse01_nombre', '$conse01_apellido',$conse01_sexo,'$conse01_fnacimiento')";
$ejecutar = $mysqli->query($insertar_persona) or die ($mysqli->error);

$RELA_CONSE01 = $mysqli->insert_id;

$insertar_usuario = "INSERT INTO conse_06_usuarios
    (CONSE06_MAIL, CONSE06_PASS, CONSE06_FAPL, RELA_CONSE01) 
VALUES ('$CONSE06_MAIL','$pass_fuerte',now(),$RELA_CONSE01)";
$ejecutar = $mysqli->query($insertar_usuario ) or die ($mysqli->error);

if($ejecutar === FALSE){
    //Si no se elimina respondemos con un mensaje de error.
    $return_arr = array("respuesta"=>"error", "msg"=>"Hubo un error al eliminar");
}else{
    //Si se elimina respondemos con un mensaje satisfactorio.
    $return_arr = array("respuesta"=>"success", "msg"=>"Se creo la cuenta correctamente");
}

echo json_encode($return_arr);

?>