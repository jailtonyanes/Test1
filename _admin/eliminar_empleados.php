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
  
 $cadena = str_replace("empleado_id=on or","",$_POST['condition']);


$crud->eliminar("empleado",$con->getConection(),"$cadena","Empleados eliminados exitosamente.");

 $con->desconectar();

?>
