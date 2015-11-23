<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
  $cadena = str_replace("pregunta_id=on or","",$_POST['condition']);

$query="delete from preguntas where $cadena";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo 'Pregunta eliminada exitosamente.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);

?>
