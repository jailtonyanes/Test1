<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Sucursal Actualizada Con Exito.';

 $crud->update("update sucursal set cliente_id='$_POST[select_cliente]', departamento_id ='$_POST[select_dpto]',
 	municipio_id='$_POST[select_municipio]', sucursal_nombre ='$_POST[nombre]',sucursal_direccion='$_POST[direccion]'
 	, sucursal_telefono ='$_POST[telefono]',
 	sucursal_contacto_nombre='$_POST[suc_contacto]', sucursal_contacto_email ='$_POST[email_contacto]',sucursal_contacto_telefono='$_POST[tel_contacto]'
  where sucursal_id ='$_POST[iden2]' 
 	",$mensaje,$con->getConection());

?>

