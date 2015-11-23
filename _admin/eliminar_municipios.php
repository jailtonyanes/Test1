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
  
 $cadena = str_replace("municipio_id=on or","",$_POST['condition']);


$crud->eliminar("municipio",$con->getConection(),"$cadena","Municipios eliminados exitosamente.");

 $con->desconectar();

?>
