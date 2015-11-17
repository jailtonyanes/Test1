
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
  list($id,$import) = split('[/]', $_GET['uid']);

?>
    <input type="hidden" name="iden" id="iden" />
   
   <?php
    $query="SELECT cliente.cliente_nombre, cliente.cliente_apellido, marca.marca_nombre
FROM marca INNER JOIN cliente ON marca.cliente_id = cliente.cliente_id where cliente.cliente_id='$id'";
	$result2=mysql_query($query,$connection);
	if($result2)
	{
	 $row2=mysql_fetch_array($result2);
	?>
	 <h2>Estado de Cuenta de <?php echo $row2['cliente_nombre'].' '.$row2['cliente_apellido'].' ('.$row2['marca_nombre'].')'?></h2>
	<?php
	
	}
   ?>
     
 <table width="1100" height="89" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
   
    <th width="" class="margen_der_abj">Imp. No</th>
    
    <th width="45" class="margen_der_abj">Marca</th>
    <th width="72" class="margen_der_abj"> Tipo</th>
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
   ON importacion.importacion_id = importacion_linea.importacion_id)
   ON cliente_linea.linea_id = linea.linea_id) ON linea_mercancia.linea_id = linea.linea_id)
   INNER JOIN mercancia ON linea_mercancia.mercancia_id = mercancia.mercancia_id) ON marca.cliente_id = cliente.cliente_id)
   ON calzadoc_linea.linea_id = linea.linea_id where cliente.cliente_id='$id' and importacion.importacion_numero='$import'
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
    
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['importacion_numero']; ?></td>
    
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['marca_nombre']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['mercancia_nombre']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['calzadoc_marca']; ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['linea_bultos']; ?></td>
     <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if( $row['linea_metros']==''){echo 'N/A';}else{echo $row['linea_metros'];} ?></td>
      <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if( $row['linea_yarda']==''){echo 'N/A';}else{echo $row['linea_yarda'];} ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($row['linea_cubicaje']==''){echo 'N/A';}else{ echo $row['linea_cubicaje']; }  ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($row['par']==''){echo 'N/A';}else{ echo $row['par']; }  ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_traida']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_neto']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['descuento']; ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['valor_total']; ?></td>
  

  </tr>
  
  <?php
      $i++;
	  }
	 }
   mysql_close($connection);
  ?>
</table>
<div id="report_control">
<a style="cursor:pointer;color:#06F" onclick="javascript:cierra_reporte()"title="Cerrar este reporte"><img src="../_images/1318203459_list-remove.ico" alt="Close" width="16"height="16" ></a>
</div>

