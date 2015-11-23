


<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
 $query="update ciudad set ciudad_nombre='$_POST[ciudad]' where ciudad_id='$_POST[iden2]'";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo'Ciudad Exitosamente Actualizada.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);

?>

