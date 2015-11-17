
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
 
 
 
 
 <!-- Clientes con marca asignada  -->
 <h2>Lista de Pueblos  </h2>
    <input type="hidden" name="iden" id="iden" />
     <div id="botonera">
      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients2()"  />
 
      </div>
 <table width="800" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox1" id="checkbox1" onclick="checkTodos2(this.id,'view_cli2');" /></th>
    <th class="margen_der_abj">Nombre del Pueblo</th>
   
    <th class="margen_der_abj">Precio</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="select pueblo_id,pueblo_nombre,pueblo_precio from pueblo order by pueblo_nombre asc";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6"';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['pueblo_id']?>" value="<?php echo $row['pueblo_id']?> " />
    </td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_cliente2(<?php echo $row['pueblo_id']; ?>);" style="cursor:pointer;color:#06f;"><?php echo $row['pueblo_nombre']?></a></td>
    
    <td align="right" class="margen_der_abj"<?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo '$'.number_format($row['pueblo_precio'],0,',','.');
																										 ?></td>
    
   
  </tr>
  
  <?php
        $i++;
	   }
	  
	 }
	 mysql_close($connection);
  ?>
</table>

