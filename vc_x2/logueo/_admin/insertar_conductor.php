<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 
 
  $query="insert into conductor 
  (conductor_nombre,conductor_apellido,conductor_movil,conductor_cel,conductor_direccion,conductor_placa,conductor_lc)
  values('$_POST[nombre]','$_POST[apellido]','$_POST[movil]','$_POST[telefono]','$_POST[direccion]','$_POST[placa]','$_POST[licencia]')";
  $result=mysql_query($query,$connection);
  if($result)
   {
    
    
	    echo'Conductor Ingresado Satisfactoriamente.';
	 
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
?>