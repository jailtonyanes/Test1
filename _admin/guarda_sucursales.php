<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     



  
  $array[0] = "'$_POST[select_cliente]','$_POST[select_dpto]','$_POST[select_municipio]','$_POST[nombre]','$_POST[direccion]',
  '$_POST[telefono]','$_POST[suc_contacto]','$_POST[email_contacto]','$_POST[tel_contacto]'";

$campos="cliente_id,departamento_id,municipio_id,sucursal_nombre,sucursal_direccion,sucursal_telefono,sucursal_contacto_nombre
,sucursal_contacto_email,sucursal_contacto_telefono";
$tabla= "sucursal";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Sucursal Ingresada Exitosamente.');
  

  $con-> desconectar(); 
     
?>