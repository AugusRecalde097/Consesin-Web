<?php 
//envia el encabezado
header('Content-type: application/json');

require ('../vendor/autoload.php');
include 'connect.php';

$fieldsForm = $_POST['fieldsForm'];
$CONSE02_DESCRI = $fieldsForm['sintoma_titulo']; 	
$CONSE02_SUBDESCRI = $fieldsForm['sintoma_descri']; 	
$CONSE02_INSTRUCCION = $fieldsForm['sintoma_instruccion'];

$insertar_sintomas = "INSERT INTO conse_02_sintomas(CONSE02_DESCRI, CONSE02_SUBDESCRI, CONSE02_INSTRUCCION) 
VALUES ('$CONSE02_DESCRI','$CONSE02_SUBDESCRI','$CONSE02_INSTRUCCION')
";
$ejecutar = $mysqli->query($insertar_sintomas) or die ($mysqli->error);
$RELA_CONSE02 = $mysqli->insert_id;

$fieldsSubform = $_POST['fieldsSubform'];
foreach( $fieldsSubform as $field){
    $CONSE03_GRADO = $field['grado_sintoma'];
    $CONSE03_VALOR = $field['valor_parametro'];

    $insertar_parametros = "INSERT INTO conse_03_parametros
        (CONSE03_GRADO, CONSE03_VALOR, RELA_CONSE02) 
    VALUES ('$CONSE03_GRADO','$CONSE03_VALOR','$RELA_CONSE02')
    ";
    $ejecutar = $mysqli->query($insertar_parametros) or die ($mysqli->error);
}

if($ejecutar === FALSE){
    //Si no se elimina respondemos con un mensaje de error.
    $return_arr = array("respuesta"=>"error", "msg"=>"Hubo un error al dar de alta");
}else{
    //Si se elimina respondemos con un mensaje satisfactorio.
    $return_arr = array("respuesta"=>"success", "msg"=>"Se creo el sintoma correctamente");
}

echo json_encode($return_arr);

?>