<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 list($id_c,$tipo_m) = split('[/.-]', $_GET['uid']);
 
 if($tipo_m==12)
 {
  $tipo='cacharro';
 }
 if($tipo_m==14)
 {
  $tipo='calzadob';
 }
 if($tipo_m==15)
 {
  $tipo='tela';
 }
 if($tipo_m==16)
 {
  $tipo='confeccion';
 }
 if($tipo_m==17)
 {
    $tipo='juguete';
 }
 if($tipo_m==18)
 {
    $tipo='coch';
 }
 if($tipo_m==19)
 {
    $tipo='electro';
 }
 


$query = "select $tipo from cliente where cliente_id=$id_c";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);

mysql_close($connection);

header('Content-Type: text/xml'); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>
<user>
<preciot>'.$row[$tipo].'</preciot>


</user>';
?>