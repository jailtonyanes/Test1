<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
  $cadena = str_replace("pueblo_id=on or","",$_POST['condition']);

$query="delete from pueblo where $cadena";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo 'Pueblo eliminado exitosamente.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);
 // echo $query;
?>
