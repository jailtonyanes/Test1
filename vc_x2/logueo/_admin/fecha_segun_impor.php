<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
list($import,$client) = split('[/.-]', $_GET['iden']);
$query = "SELECT importacion.importacion_fecha
FROM importacion where importacion_id='$_GET[iden]'
";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);

mysql_close($connection);

header('Content-Type: text/xml'); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>
<user>
<fecha>'.$row['importacion_fecha'].'</fecha>


</user>';
?>