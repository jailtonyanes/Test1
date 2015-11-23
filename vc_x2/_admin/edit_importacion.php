


<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
 $query="update importacion set importacion_numero='$_POST[impornum]',importacion_fecha='$_POST[fecha]',importacion_fecha_llegada='$_POST[fechalleg]', 
 importacion_fecha_levante='$_POST[fechalev]'  where importacion_id='$_POST[imporid]'";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo'Regsitro Exitosamente Actualizado.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);

?>

