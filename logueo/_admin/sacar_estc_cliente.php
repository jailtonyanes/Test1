
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
    <input type="hidden" name="iden" id="iden" />
     
 <table width="1100" height="89" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
   
    <th width="" class="margen_der_abj">Apellidos Y Nombres</th>
    
    <th width="45" class="margen_der_abj">Marca</th>
    <th width="45" class="margen_der_abj">No. Importaci&oacute;n</th>
    <th width="72" class="margen_der_abj"> Total a pagar</th>

    <th width="47" class="margen_der_abj">Detalles</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="SELECT importacion.importacion_numero,cliente.cliente_id,cliente.cliente_apellido, cliente.cliente_nombre, marca.marca_nombre, Sum(linea.valor_total) AS SumaDevalor_total
FROM (importacion INNER JOIN importacion_linea ON importacion.importacion_id = importacion_linea.importacion_id) INNER JOIN ((cliente_linea INNER JOIN (marca INNER JOIN cliente ON marca.cliente_id = cliente.cliente_id) ON cliente_linea.cliente_id = cliente.cliente_id) INNER JOIN ((linea_mercancia INNER JOIN ((calzadoc_linea INNER JOIN calzadoc ON calzadoc_linea.calzadoc_id = calzadoc.calzadoc_id) INNER JOIN linea ON calzadoc_linea.linea_id = linea.linea_id) ON linea_mercancia.linea_id = linea.linea_id) INNER JOIN mercancia ON linea_mercancia.mercancia_id = mercancia.mercancia_id) ON cliente_linea.linea_id = linea.linea_id) ON importacion_linea.linea_id = linea.linea_id
GROUP BY cliente.cliente_apellido, cliente.cliente_nombre, marca.marca_nombre,importacion.importacion_numero
";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><a  onclick="javascript: sacar_estado('<?php echo $row['cliente_id']; ?>','<?php echo $row['importacion_numero']; ?>');" style="cursor:pointer;color:#06F"><?php echo $row['cliente_apellido'].' '.$row['cliente_nombre'] ?></a></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['marca_nombre'] ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['importacion_numero'] ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['SumaDevalor_total'] ?></td>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: sacar_estado('<?php echo $row['cliente_id']; ?>','<?php echo $row['importacion_numero']; ?>');" style="cursor:pointer;color:#00F"><img src="../_images/1318201294_xmag.ico" alt="View Icon"  > </a></td>
  
  
  </tr>
  
  <?php
      $i++;
	  }
	 }
    mysql_close($connection);
  ?>
</table>



