<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='NOVEDAD MONTADA CON EXITO.';

 $crud->update("update programacion set novedad_id='$_POST[departamento_id]', novedad_horas ='$_POST[n_horas]' where guarda_id ='$_POST[iden2]' 
 	and fecha >='$_POST[fini]' and fecha <= '$_POST[f_fin]'",$mensaje,$con->getConection());

?>

