


<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<?php
 
   
 

   
  $query2="update categoria set categoria_nombre='$_POST[categoria_nombre]' where categoria_id='$_POST[iden2]'";
   $result2=mysql_query($query2,$connection);
   if($result2)
    {
	 echo'Catgegoria Exitosamente Actualizada.';
	}
	else
	{
     echo mysql_error();
	}


  mysql_close($connection);
?>

