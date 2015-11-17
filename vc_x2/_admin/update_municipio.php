<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
   // header("Cache-Control: no-cache, must-revalidate"); 

 $consulta="UPDATE municipio SET departamento_id ='$_POST[departamento_id]', municipio_nombre = '$_POST[nombre]'
WHERE municipio_id='$_POST[iden2]'";
$mensaje="Municipio Actualizado con exito.";

 $crud->update($consulta,$mensaje,$con->getConection());

 $con->desconectar();


?>