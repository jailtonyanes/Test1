<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

$query = "select usuario_parte,usuario_id from usuario where usuario_cedula='$_GET[iden]'";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);

mysql_close($connection);

header('Content-Type: text/xml'); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>
<user>
<valor>'.$row['usuario_parte'].'</valor>
<id>'.$row['usuario_id'].'</id>

</user>';
?>