
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
    <input type="hidden" name="iden" id="iden" />
      <div id="botonera">
      <input type="button" name="eliminar" id="eliminar" value="Eliminar" onclick="javascript:delete_clients()"  />
      <input type="button" name="activar" id="activar" value="Activar" onclick="javascript:activate_cliente(1)"  />
      <input type="button" name="desactivar" id="desactivar" value="Desactivar" onclick="javascript:activate_cliente(0)"  />
      </div>
 <table width="1100" height="89" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th width="21" align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_mer');" /></th>
    <th width="" class="margen_der_abj">Imp. No</th>
    
    <th width="45" class="margen_der_abj">Marca</th>
    <th width="72" class="margen_der_abj"> Linea</th>
    <th width="141" class="margen_der_abj">Marca Calzado</th>
    <th width="57" class="margen_der_abj">Bultos</th>
      <th width="47" class="margen_der_abj">Mts</th>
      <th width="46" class="margen_der_abj">Yds</th>
      <th width="76" class="margen_der_abj">cubicaje</th>
    <th width="44" class="margen_der_abj">Pares</th>
    <th width="69" class="margen_der_abj">Vlr.Traida</th>
    <th width="61" class="margen_der_abj">Vlr.Neto</th>
     <th width="62" class="margen_der_abj">Descto</th>
    <th width="51" class="margen_der_abj">Total</th>

    <th width="59" class="margen_der_abj">Editar</th>
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="SELECT calzadoc.calzadoc_marca, marca.marca_nombre, importacion.importacion_numero, linea.linea_id, linea.linea_cubicaje, linea.par, linea.valor_traida, linea.valor_total, linea.valor_neto, linea.descuento, linea.linea_bultos, linea.linea_yarda, linea.linea_metros, mercancia.mercancia_nombre,importacion.importacion_numero
FROM (calzadoc_linea INNER JOIN calzadoc ON calzadoc_linea.calzadoc_id = calzadoc.calzadoc_id)
 INNER JOIN (marca
 INNER JOIN
 ((linea_mercancia
  INNER JOIN ((cliente
 INNER JOIN
 cliente_linea ON cliente.cliente_id = cliente_linea.cliente_id)
 INNER JOIN
 (importacion
 INNER JOIN
 (linea INNER JOIN
  importacion_linea ON linea.linea_id = importacion_linea.linea_id)
   ON importacion.importacion_id = importacion_linea.importacion_id) ON cliente_linea.linea_id = linea.linea_id) ON linea_mercancia.linea_id = linea.linea_id) INNER JOIN mercancia ON linea_mercancia.mercancia_id = mercancia.mercancia_id) ON marca.cliente_id = cliente.cliente_id) ON calzadoc_linea.linea_id = linea.linea_id
ORDER BY marca.marca_nombre, importacion.importacion_numero
";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['linea_id']  ?>" value="<?php echo $row['linea_id']  ?> " />
    </td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_despacho(<?php echo $row['linea_id']; ?>);" style="cursor:pointer;color:#06F"><?php echo $row['importacion_numero']; ?></a></td>
    
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['marca_nombre']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['mercancia_nombre']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['calzadoc_marca']; ?></td>
    <td  align="right"class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['linea_bultos']; ?></td>
     <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if( $row['linea_metros']==''){echo 'N/A';}else{echo $row['linea_metros'];} ?></td>
      <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if( $row['linea_yarda']==''){echo 'N/A';}else{echo $row['linea_yarda'];} ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($row['linea_cubicaje']==''){echo 'N/A';}else{ echo $row['linea_cubicaje']; }  ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($row['par']==''){echo 'N/A';}else{ echo $row['par']; }  ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_traida']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_neto']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['descuento']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_total']; ?></td>
  
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: editar_despacho(<?php echo $row['linea_id']; ?>);" style="cursor:pointer;color:#00F;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>
  </tr>
  
  <?php
      $i++;
	  }
	 }

  ?>
</table>

<?php
	 $query2="SELECT sum(linea.valor_total)as total
FROM (calzadoc_linea INNER JOIN calzadoc ON calzadoc_linea.calzadoc_id = calzadoc.calzadoc_id)
 INNER JOIN (marca
 INNER JOIN
 ((linea_mercancia
  INNER JOIN ((cliente
 INNER JOIN
 cliente_linea ON cliente.cliente_id = cliente_linea.cliente_id)
 INNER JOIN
 (importacion
 INNER JOIN
 (linea INNER JOIN
  importacion_linea ON linea.linea_id = importacion_linea.linea_id)
   ON importacion.importacion_id = importacion_linea.importacion_id) ON cliente_linea.linea_id = linea.linea_id) ON linea_mercancia.linea_id = linea.linea_id) INNER JOIN mercancia ON linea_mercancia.mercancia_id = mercancia.mercancia_id) ON marca.cliente_id = cliente.cliente_id) ON calzadoc_linea.linea_id = linea.linea_id
ORDER BY marca.marca_nombre, importacion.importacion_numero;";
	$result2=mysql_query($query2,$connection);
	if($result2)
	{
	  $row2=mysql_fetch_array($result2);
	  ?>
<label>Total por de este cliente:
       <input type="text" name="grant" id="grant" value="<?php echo $row2['total'] ?>"/>
     </label>
<?php
	  
	}
	 mysql_close($connection);
?>

