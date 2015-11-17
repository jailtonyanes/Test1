  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

  $query="select pueblo_id,pueblo_nombre from pueblo order by pueblo_nombre asc";
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
		  
				<option value="<?php echo $row['pueblo_id'] ?>" ><?php echo $row['pueblo_nombre'] ?></option>
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


      