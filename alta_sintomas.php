<?php 

require_once("template/raelgc/view/Template.php");
require ('./vendor/autoload.php');
include 'db/connect.php';
  
use raelgc\view\Template;
  $tpl = new Template("ver_alta_sintomas.html");
  $subform = "";
  for($i = 0; $i < 4; $i++){

    $subform .= '<fieldset id="'.$i.'" class="card shadow-sm p-3 mb-3 bg-body rounded"><div class="mb-3 row"><label for="inputName" class="col-4 col-form-label">Grado</label><div class="col-8"><input type="text" class="form-control" name="grado_sintoma" id="grado_sintoma" value="'.$i.'" disabled></div></div><div class="mb-3 row"><label for="inputName" class="col-4 col-form-label">Valor</label><div class="col-8"><input type="text" class="form-control" name="valor_parametro" id="valor_parametro"></div></div></fieldset>';
  }

  $tpl->ITEM =  str_replace("\n","", $subform);

  $tpl->show();

?>