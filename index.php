<?php 

require_once("template/raelgc/view/Template.php");
require ('./vendor/autoload.php');
//include 'db/connect.php';
  
use raelgc\view\Template;
  $tpl = new Template("ver_home.html");
  $tpl->set_var('PRUEBA', 'PRUEBA DE TEMPLATE');
  $tpl->show();

?>

