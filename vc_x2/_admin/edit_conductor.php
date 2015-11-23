<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
  $query2="update conductor set conductor_nombre='$_POST[nombre]',conductor_apellido='$_POST[apellido]',conductor_movil='$_POST[movil]',conductor_cel='$_POST[telefono]',conductor_direccion='$_POST[direccion]',conductor_placa='$_POST[placa]',conductor_lc = '$_POST[licencia]' where conductor_id='$_POST[iden2]'";
   $result2=mysql_query($query2,$connection);
   if($result2)
    {
	 echo'Conductor Exitosamente Actualizado.';
	}
	else
	{
     echo mysql_error();
	}
  mysql_close($connection);
?>
