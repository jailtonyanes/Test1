<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     



  
  $array[0] = "'$_POST[nombre]','$_POST[codigo]','$_POST[tipo_nov]','$_POST[reemp]'";

$campos="nombre,codigo,tipo,reemplazo";
$tabla= "novedad";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Novedad Ingresada Exitosamente.');
  

  $con-> desconectar(); 
     
?>