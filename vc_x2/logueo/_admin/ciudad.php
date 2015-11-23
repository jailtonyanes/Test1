 
 <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/ciudad.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ciudad</title>
</head>

<body>
<h2>Ingresar Ciudad</h2>
<form id="calzado" name="calzado" method="post" action="">
  
<p>
    <label>* Nombre de la ciudad:
      <input type="text" name="ciudad" id="ciudad" />
    </label>
  </p>

  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar" />
    </label>
  </p>
</form>
</body>
</html>