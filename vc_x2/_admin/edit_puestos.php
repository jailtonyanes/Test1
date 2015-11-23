<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Puesto Actualizado Con Exito.';

 $crud->update("update puesto set cliente_id='$_POST[select_cliente]', departamento_id ='$_POST[select_dpto]', municipio_id 
 ='$_POST[select_municipio]', sucursal_id ='$_POST[select_sucursal]',puesto_nombre='$_POST[puesto]' where puesto_id ='$_POST[iden2]' 
 	",$mensaje,$con->getConection());

?>

