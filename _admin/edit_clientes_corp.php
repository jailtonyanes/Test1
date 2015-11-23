<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Cliente Actualizado Con Exito.';

 $crud->update("update cliente set cliente_nit='$_POST[nit]',cliente_nombre ='$_POST[nombre]',
 cliente_direccion='$_POST[direccion]',cliente_telefono='$_POST[telefono]',cliente_email='$_POST[email]',
cliente_web ='$_POST[web]',contacto_nombre='$_POST[c_nombre]',contacto_telefono='$_POST[c_telefono]',contacto_email = '$_POST[c_email]'
 where cliente_id ='$_POST[iden2]' 
 	",$mensaje,$con->getConection());

?>

