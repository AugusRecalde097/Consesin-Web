<?php 


  require_once("template/raelgc/view/Template.php");
  use raelgc\view\Template;
  $tpl = new Template("bienvenido.html");
  
    //print_r($_POST);exit;

  $tpl->NOMBRE_PERSONA = "";
  $tpl->NOMBRE_PERSONA = $_POST['nombre_persona'];

  $tpl->show();




?>