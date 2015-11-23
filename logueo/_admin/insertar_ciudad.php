<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  $query="insert into ciudad (ciudad_nombre,ciudad_active)values('$_POST[ciudad]',1) ";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Ciudad Ingresada Satisfactoriamente.'; 
   }
   else
	  {
	    echo mysql_error();
	  }
 
  mysql_close($connection);

?>