<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['costo'] = str_replace($moneda, $numero, $_POST['costo']);
  $query="insert into calzadoc (calzadoc_marca,calzadoc_valor,calzadoc_active)values('$_POST[marca]','$_POST[costo]',1) ";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Calzado Ingresado Satisfactoriamente.'; 
   }
   else
	  {
	    echo mysql_error();
	  }
 
  mysql_close($connection);

?>