<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  
      $sentencia="insert into categoria (categoria_nombre)values('$_POST[categoria_nombre]')";
 
	
 
 $query=$sentencia;
  $result=mysql_query($query,$connection);
  if($result)
   {
    echo'Categoria Ingresada Satisfactoriamente.';
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
?>