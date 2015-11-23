<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
   // header("Cache-Control: no-cache, must-revalidate"); 

 $consulta="UPDATE festivo SET fecha_festiva ='$_POST[fecha2]'
WHERE fecha_id='$_POST[iden2]'";
$mensaje="Fecha Actualizada con exito.";

 $crud->update($consulta,$mensaje,$con->getConection());

 $con->desconectar();


?>