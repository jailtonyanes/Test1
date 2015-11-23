<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[apellido_uno]','$_POST[apellido_dos]','$_POST[nombre_uno]','$_POST[nombre_dos]','$_POST[cedula]','$_POST[direccion]','$_POST[telefono_fijo]','$_POST[celular]','$_POST[email]'
  ,'$_POST[cargo]','$_POST[tipo_sangre]','$_POST[departamento_id]','$_POST[select_municipio]','$_POST[barrio]'";

$campos="apellido1,apellido2,nombre1,nombre2,cedula,direccion,telefono_fijo,celular,email,cargo,tipo_sangre,departamento_id,municipio_id,barrio";
$tabla= "empleado";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Empleado Ingresado Exitosamente.');
  

  $con-> desconectar();
  
?>