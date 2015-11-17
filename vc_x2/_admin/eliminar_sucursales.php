<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
?>
<?php
  
 $cadena = str_replace("sucursal_id=on or","",$_POST['condition']);


$crud->eliminar("sucursal",$con->getConection(),"$cadena","Sucursales eliminadas exitosamente.");

 $con->desconectar();

?>
