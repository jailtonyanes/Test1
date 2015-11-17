
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
 
<?php
 $query="insert into marca(marca_nombre,cliente_id)values('$_POST[marca]','$_POST[cliente]')";
 $result=mysql_query($query,$connection);
	 if($result)
	 {
       echo'Marca Asignada Exitosamente.';	 
	 }
	 else
	 {
	  echo mysql_error();
	 }
?>

