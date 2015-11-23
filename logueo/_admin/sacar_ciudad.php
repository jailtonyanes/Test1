
<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
    <input type="hidden" name="iden" id="iden" />
 <div id="botonera">
      <input type="button" name="eliminar" id="eliminar" value="Eliminar" onclick="javascript:delete_calzado()"  />
      <input type="button" name="activar" id="activar" value="Activar" onclick="javascript:activate_calzado(1)"  />
      <input type="button" name="desactivar" id="desactivar" value="Desactivar" onclick="javascript:activate_calzado(0)"  />
       </div>
 <table width="683" border="1" id="datos_cal" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" align="center">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_ciu');" /></td>
    <th width="342">Nombre De La Ciudad</th>
   
    <th width="89">Editar</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="select * from ciudad order by ciudad_active desc, ciudad_nombre asc";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center">
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['ciudad_id']  ?>" value="<?php echo $row['ciudad_id']  ?> " />
    </td>
    <td><a  onclick="javascript: editar_calzado(<?php echo $row['ciudad_id']; ?>);" style="cursor:pointer;color:#00F"><?php echo $row['ciudad_nombre']; ?></a></td>
   
     <td align="center"><a onclick="javascript: editar_calzado(<?php echo $row['ciudad_id']; ?>);" style="cursor:pointer;color:#00F;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>

  </tr>
  
  <?php
       }
	 }
	 mysql_close($connection);
  ?>
</table>

