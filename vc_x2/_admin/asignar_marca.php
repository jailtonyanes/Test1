<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/asignar_marca.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asignar Marca a los Clientes</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu.php');
    ?>
 <div id="content">  
<h2 class="datos_cli">Asignar Marca a Los Clientes</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Escriba la marca:
      <input type="text" name="marca" id="marca"  class="ancho"/>
    </label>
  </p>
  
  <p>
    <label>* Escoja el cliente:
     
   
      <select name="cliente" id="cliente" class="ancho2">
        <option value="0" selected="selected">Seleccione una opci&oacute;n</option>
        <?php
		 $query="select cliente_id,cliente_nombre,cliente_apellido from cliente order by cliente_apellido asc";
		 $result=mysql_query($query,$connection);
		 $num_rows=mysql_num_rows($result);
		 if($num_rows>0){
		  while($row=mysql_fetch_array($result))
		   {
		  ?>
              <option value="<?php echo $row['cliente_id'] ?>"><?php echo  $row['cliente_apellido'].' '.$row['cliente_nombre'] ?></option>
		  <?php 
		   }
		 }
		 mysql_close($connection);
		?>
      </select>
    </label>
  </p>
   
 
 
  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar"  class="guarda"/>
    </label>
  </p>
</form>
</div>
</div>
</body>
</html>