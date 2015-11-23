	<?php
  
 $server='192.168.0.3';
  $user='root';
  $password='milagros';
	$data_base = "CVS";
	
	$connection = mysql_connect($server,$user,$password);
mysql_select_db($data_base);

	$q = strtolower($_GET["q"]);
	if (!$q) return;
	 
	 $sql = "SELECT nombre FROM sucursal WHERE si_activo = 's' and nombre LIKE '%$q%' ORDER BY nombre ASC";
	$rsd = mysql_query($sql);
	while($rs = mysql_fetch_array($rsd)) {
	    $cname = trim(trim($rs['nombre']));
	    echo "$cname\n";
	}
	
	?>