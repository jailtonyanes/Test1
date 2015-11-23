<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[year]','$_POST[monto]'";

$campos="fecha,minimo_monto";
$tabla= "minimo";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Monto Ingresado Exitosamente.');
  

  $con-> desconectar();
  
?>