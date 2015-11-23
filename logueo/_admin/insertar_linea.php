<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  $query="insert into mercancia(mercancia_nombre,mercancia_active)values('$_POST[mercancia]',1) ";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Item Ingresado Satisfactoriamente.'; 
   }
   else
	  {
	    echo mysql_error();
	  }
 
  mysql_close($connection);

?>