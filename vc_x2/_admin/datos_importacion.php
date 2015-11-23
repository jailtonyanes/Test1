<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

$query = "select * from importacion  where importacion_id= $_GET[iden]";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);

mysql_close($connection);

header('Content-Type: text/xml'); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>
<user>
<fecha>'.$row['importacion_fecha'].'</fecha>
<fecha2>'.$row['importacion_fecha_llegada'].'</fecha2>
<fecha3>'.$row['importacion_fecha_levante'].'</fecha3>
<numero>'.$row['importacion_numero'].'</numero>

</user>';
?>