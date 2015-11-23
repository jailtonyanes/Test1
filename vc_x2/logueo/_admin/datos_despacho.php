<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

$query = "select linea.linea_id,importacion.importacion_id,linea.fecha,cliente.cliente_id,linea_bultos,
mercancia.mercancia_id,calzadoc.calzadoc_id,linea.linea_cubicaje,
linea.par,linea.valor_traida,linea.valor_neto,linea.descuento,linea.valor_total,linea.linea_yarda,linea.linea_metros
from importacion,linea,importacion_linea,cliente,cliente_linea,mercancia,linea_mercancia,calzadoc,calzadoc_linea,marca
where importacion_linea.importacion_id=importacion.importacion_id
and importacion_linea.linea_id=linea.linea_id
and cliente_linea.cliente_id=cliente.cliente_id
and cliente_linea.linea_id = linea.linea_id
and linea_mercancia.mercancia_id=mercancia.mercancia_id
and linea_mercancia.linea_id=linea.linea_id
and calzadoc_linea.linea_id=linea.linea_id
and calzadoc_linea.calzadoc_id=calzadoc.calzadoc_id
and marca.cliente_id=cliente.cliente_id
 and linea.linea_id ='$_GET[iden]'";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);
if($row['par']=='')
 {
  $pares='N/A';
 }
 else
 {
   $pares=$row['par'];
 }
 
 
 if($row['linea_yarda']=='')
 {
   $yarda='N/A';
 }
 else
 {
  $yarda=$row['linea_yarda'];
 }
 
 if($row['linea_metros']=='')
 {
   $metros='N/A';
 }
 else
 {
   $metros=$row['linea_metros'];
 }
 
mysql_close($connection);

header('Content-Type: text/xml'); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>
<user>
<impor_num>'.$row['importacion_id'].'</impor_num>
<fecha>'.$row['fecha'].'</fecha>
<cliente>'.$row['cliente_id'].'</cliente>
<mercancia>'.$row['mercancia_id'].'</mercancia>
<calzado>'.$row['calzadoc_id'].'</calzado>
<cubicaje>'.$row['linea_cubicaje'].'</cubicaje>
<pares>'. $pares.'</pares>
<ptraida>'.$row['valor_traida'].'</ptraida>
<pneto>'.$row['valor_neto'].'</pneto>
<desc>'.$row['descuento'].'</desc>
<total>'.$row['valor_total'].'</total>
<yardas>'.$yarda.'</yardas>
<metros>'.$metros.'</metros>
<bultos>'.$row['linea_bultos'].'</bultos>

</user>';
?>
