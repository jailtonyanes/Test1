<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
  
 $cadena = str_replace("importacion_id=on or","",$_POST['condition']);
 
 $query="delete from importacion where $cadena";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo 'Item eliminado exitosamente.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);
echo $query;
?>
