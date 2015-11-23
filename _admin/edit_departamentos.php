<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Departamento Actualizado Con Exito.';

 $crud->update("update departamento set departamento_nombre= '$_POST[nombre]' where departamento_id='$_POST[iden2]'",$mensaje,$con->getConection());

?>

