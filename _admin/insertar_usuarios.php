<?php
  include('../_include/configuration.php');
  include("../_classes/conectar.php");
  include("../_classes/crud.php");


       
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();


  $array[0] = "'$_POST[nombre]','$_POST[apellido]','$_POST[nick]','$_POST[password]','$_POST[tipo_usuario]','$_POST[estado_usuario]'";

$campos="usuario_nombre,usuario_apellido,usuario_nick,usuario_password,usuario_tipo,usuario_active";
$tabla= "usuario";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Usuario Ingresado Exitosamente.');
  

  $con-> desconectar();
  
?>