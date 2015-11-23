<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[departamento_id]','$_POST[nombre]'";

$campos="departamento_id,municipio_nombre";
$tabla= "municipio";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Municipio Ingresado Exitosamente.');
  

  $con-> desconectar();
  
?>