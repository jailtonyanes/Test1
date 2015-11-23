
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
 <table width="817" border="0" id="datos_cal" cellpadding="0" cellspacing="0">
  <tr>
    <th width="23" align="center" class="margen_der_abj" >
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_impor');" /></th>
       <th width="196" class="margen_der_abj">N&uacute;mero de Importaci&oacute;n</th>
      <th width="175" class="margen_der_abj">Fecha De Salida</th>
      <th width="175" class="margen_der_abj">Fecha De Llegada</th>
        <th width="175" class="margen_der_abj">Fecha De Levante</th>
   
  <th width="71" class="margen_der_abj">Editar</th>
   
 
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="select * from importacion order by importacion_active desc,importacion_fecha desc,  importacion_numero asc";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['importacion_id']  ?>" value="<?php echo $row['importacion_id']  ?> " />
    </td>
   <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: editar_calzado(<?php echo $row['importacion_id']; ?>);" style="cursor:pointer;color:#06F;" ><?php echo $row['importacion_numero']; ?></a></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['importacion_fecha']; ?></a></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['importacion_fecha_llegada']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['importacion_fecha_levante']; ?></td>
    
      <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: editar_calzado(<?php echo $row['importacion_id']; ?>);" style="cursor:pointer;color:#00F;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>

  </tr>
  
  <?php
       $i++;
	   }
	 }
	 mysql_close($connection);
  ?>
</table>

