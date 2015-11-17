


<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
 
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['precio'] = str_replace($moneda, $numero, $_POST['precio']);
 
 $query="update calzadoc set calzadoc_marca='$_POST[marca]',calzadoc_valor='$_POST[precio]' where calzadoc_id='$_POST[iden2]'";
 $result=mysql_query($query,$connection);
 if($result)
  {
    echo'Calzado Exitosamente Actualizado.';
   
  }
  else
  {
   echo mysql_error();
  }
  mysql_close($connection);

?>

