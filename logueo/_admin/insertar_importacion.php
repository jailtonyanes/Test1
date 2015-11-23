<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  
 
  $query="insert into importacion (importacion_numero,importacion_fecha,importacion_fecha_llegada,importacion_fecha_levante,importacion_active)
  values('$_POST[impornum]','$_POST[fecha]','$_POST[fechalleg]','$_POST[fechalev]',1) ";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Registro Ingresado Satisfactoriamente.'; 
   }
   else
	  {
	    echo mysql_error();
	  }
 
  mysql_close($connection);

?>