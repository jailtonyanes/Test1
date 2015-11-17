  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

  echo $query="SELECT barrio.barrio_id, barrio.barrio_nombre
FROM barrio INNER JOIN zona ON barrio.zona_id = zona.zona_id where zona_municipio='$_GET[uid]' order by barrio_nombre";
 $result=mysql_query($query,$connection);
 if($result)
 {
   $num_rows= mysql_num_rows($result);
   if($num_rows>0)
    {		
	?>
      <option value="0" selected="selected">Escoja Opci&oacute;n</option>
	<?php	
		while($row=mysql_fetch_array($result))
			{
		?>
		  
				<option value="<?php echo $row['barrio_id'] ?>" ><?php echo $row['barrio_nombre'] ?></option>
		<?php	 
			}
	}
	else
	{
	  ?>
 <option value="0" selected="selected"><?php echo 'No hay tuplas para esta consulta';?></option> 
 <?php
	}
 }
 else
 {
 ?>
 <option value="0" selected="selected"><?php echo mysql_error(); ?></option> 
 <?php
 }
 mysql_close($connection);
?>


      