<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
  $cadena = str_replace("mercancia_id=on or","",$_POST['condition']);
  
 $query="update mercancia set mercancia_active=$_POST[value] where $cadena";
 $result=mysql_query($query,$connection);
 if($result)
  {
    //echo 'Cliente eliminado exitosamente.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);
  echo $query;
?>
