<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[fecha]'";

$campos="fecha_festiva";
$tabla= "festivo";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Fecha Ingresada Exitosamente.');
  

  $con-> desconectar();
  
?>