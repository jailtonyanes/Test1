<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[nit]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]','$_POST[email]','$_POST[web]','$_POST[c_nombre]','$_POST[c_telefono]','$_POST[c_email]','1'";

$campos="cliente_nit,cliente_nombre,cliente_direccion,cliente_telefono,cliente_email,cliente_web,contacto_nombre,contacto_telefono,contacto_email,cliente_activo";
$tabla= "cliente";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Cliente Ingresado Exitosamente.');
  

  $con-> desconectar();
  
?>
