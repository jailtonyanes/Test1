<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
   // header("Cache-Control: no-cache, must-revalidate"); 

 $consulta="UPDATE minimo SET fecha ='$_POST[year]', minimo_monto ='$_POST[monto]'
WHERE minimo_id='$_POST[iden2]'";
$mensaje="Monto Actualizado con exito.";

 $crud->update($consulta,$mensaje,$con->getConection());

 $con->desconectar();


?>