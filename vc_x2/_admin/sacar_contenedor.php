
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
    <input type="hidden" name="iden" id="iden" />
     
 <table width="1100" height="89" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
   
    <th width="" class="margen_der_abj">Imp. No</th>
    
    <th width="45" class="margen_der_abj">Valor Neto</th>
    <th width="72" class="margen_der_abj"> Descuento</th>
    <th width="141" class="margen_der_abj">Total</th>
    <th width="57" class="margen_der_abj">Abono</th>
    <th width="57" class="margen_der_abj">Saldo</th>
    <th width="47" class="margen_der_abj">Detalles</th>
    
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="SELECT  importacion.importacion_id,importacion.importacion_numero, Sum(linea.valor_total) AS SumaDevalor_total, Sum(linea.descuento) AS SumaDedescuento,Sum(linea.valor_neto)as vneto,
(Sum(linea.valor_neto)-Sum(linea.descuento))as grantot
FROM (importacion INNER JOIN
 importacion_linea ON importacion.importacion_id = importacion_linea.importacion_id)
 INNER JOIN linea ON importacion_linea.linea_id = linea.linea_id
GROUP BY importacion.importacion_numero
ORDER BY Sum(linea.valor_total)
";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    
      <td  class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><a onclick="javascript: estado_por_contenedor(<?php echo $row['importacion_id'] ?>)" style="cursor:pointer;color:#06F"><?php echo $row['importacion_numero'] ?></a></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['vneto'] ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['SumaDedescuento'] ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['grantot'] ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo 0 ?></td>
    <td align="right" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo 0 ?></td>
    <td align="center" class="margen_der_abj_1" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><a onclick="javascript: estado_por_contenedor(<?php echo $row['importacion_id'] ?>)" style="cursor:pointer;color:#00F"> <img src="../_images/1318201294_xmag.ico" alt="View Icon"  ></a></td>
  
  
  </tr>
  
  <?php
       $i++;
	  }
	 }
  mysql_close($connection);
  ?>
</table>


