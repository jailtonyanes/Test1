<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
 
 
 
 
 <!-- Clientes con marca asignada  -->
 <h2>Lista de barrios  </h2>
    <input type="hidden" name="iden" id="iden" />
     <div id="botonera">
      <input type="button" name="eliminar" id="eliminar" value="Eliminar" onclick="javascript:delete_clients()"  />

      </div>
 <table width="800" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>
    <th class="margen_der_abj">Nombre del Barrio</th>
    <th class="margen_der_abj">Nombre del Municipio</th>
    <th class="margen_der_abj">Nombre de la Zona</th>
   
    <th class="margen_der_abj">Precio</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="SELECT barrio.barrio_id, barrio.barrio_nombre, zona.zona_nombre,barrio.barrio_precio, zona.zona_municipio
FROM barrio INNER JOIN zona ON barrio.zona_id = zona.zona_id
ORDER BY zona.zona_municipio,barrio.barrio_nombre,  zona.zona_nombre";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6"';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['barrio_id']?>" value="<?php echo $row['barrio_id']?> " />
    </td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_cliente(<?php echo $row['barrio_id']; ?>);" style="cursor:pointer;color:#06f;"><?php echo $row['barrio_nombre']?></a></td>
    
    <td class="margen_der_abj"<?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($row['zona_municipio']==1)
	                                                                                                     {
		                                                                                                   echo 'Barranquilla'; 
																										 }
																										 else
																										 { 
																										   if($row['zona_municipio']==2)
	                                                                                                       {
		                                                                                                    echo 'Soledad'; 
																										   }
																										   else
																										   {
																										     echo 'Pueblos';
																										   }
																										 }
																										 ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo 'Zona '.$row['zona_nombre']; ?></td>
    
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo '$'.number_format($row['barrio_precio'],0,',','.'); ?></td>
   
  </tr>
  
  <?php
        $i++;
	   }
	  
	 }
	 mysql_close($connection);
  ?>
</table>

