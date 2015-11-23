
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estado de cuenta por cliente</title>
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />

    <link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
    <!-- <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/gold/gold.css" />-->
     <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> 
      <link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/unicode-letter.js"></script>
     <script src="../src/js/lang/es.js"></script>

<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/estc_cliente.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
</head>

<body>
  <div id="container">	
	<?php
 include('../_template/main_menu.php');
?>
<h2>Estado de Cuenta Por Cliente  </h2>





<form id="view_estc" name="view_estc" method="post" action="">
 
    
    
</form>

<div id="detalle_cliente" style="display:none">
 
</div>





  </container>
</body>
</html>