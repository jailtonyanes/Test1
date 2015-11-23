
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
 <table width="683" border="0" id="datos_cal" cellpadding="0" cellspacing="0">
  <tr>
    <th width="31" align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_mer');" /></th>
    <th width="563" class="margen_der_abj">Tipo de mercanc&iacute;a</th>
   
    <th width="89" class="margen_der_abj">Editar</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="select * from mercancia order by mercancia_active desc, mercancia_nombre asc";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['mercancia_id']  ?>" value="<?php echo $row['mercancia_id']  ?> " />
    </td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_calzado(<?php echo $row['mercancia_id']; ?>);" style="cursor:pointer;color:#06F"><?php echo $row['mercancia_nombre']; ?></a></td>
   
     <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: editar_calzado(<?php echo $row['mercancia_id']; ?>);" style="cursor:pointer;color:#00F;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>

  </tr>
  
  <?php
      $i++;
	  }
	 }
	 mysql_close($connection);
  ?>
</table>

