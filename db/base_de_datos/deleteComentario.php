<?php 

//envia el encabezado
header('Content-type: application/json');
//conexion con la base de datos
require "../base_de_datos/sql_conection.php";
//Se autoinicia una sesión
session_start();
$ID_Comentario = $_POST["comment_id"];
//Elimina el comentario
$eliminar= "DELETE FROM comentario Where ID_Comentario = $ID_Comentario";
$resultado=$mysqli->query($eliminar);

if($resultado === FALSE){
    //Si no se elimina respondemos con un mensaje de error.
    $return_arr = array("respuesta"=>"error", "msg"=>"Hubo un error al eliminar");
}else{
    //Si se elimina respondemos con un mensaje satisfactorio.
    $return_arr = array("respuesta"=>"success", "msg"=>"Se elimino correctamente");
}

//Enviamos respuesta.-
echo json_encode($return_arr);

?>