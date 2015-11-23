<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     



  
  $array[0] = "'$_POST[select_cliente]','$_POST[select_dpto]','$_POST[select_municipio]','$_POST[select_sucursal]','$_POST[puesto]'";

$campos="cliente_id,departamento_id,municipio_id,sucursal_id,puesto_nombre";
$tabla= "puesto";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Puesto Ingresado Exitosamente.');
  

  $con-> desconectar(); 
     
?>