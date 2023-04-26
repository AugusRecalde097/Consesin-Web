<?php 
//envia el encabezado
header('Content-type: application/json');

require ('../vendor/autoload.php');
include 'connect.php';
$ejecutar = '';
$insertar_parametros = "select * from consesin06";
$ejecutar = $mysqli->query($insertar_parametros) or die ($mysqli->error);




if($ejecutar === FALSE){
    //Si no se elimina respondemos con un mensaje de error.
    $return_arr = array("respuesta"=>"error", "msg"=>"Hubo un error al dar de alta");
}else{
    //Si se elimina respondemos con un mensaje satisfactorio.
    $return_arr = array("respuesta"=>"success", "msg"=>"Se creo el sintoma correctamente");
}

echo json_encode($return_arr);

?>