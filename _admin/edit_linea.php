


<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
 $query="update mercancia set mercancia_nombre='$_POST[mercancia]' where mercancia_id='$_POST[iden2]'";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo'Item Exitosamente Actualizado.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);

?>

