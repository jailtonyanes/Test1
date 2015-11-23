<?php  
  include('../_include/configuration.php');
session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resumen General</title>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/resultados_gen.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
<?php
 include('../_template/main_menu.php');
 
?>
<h2>Respuestas individuales</h2>
<p style="text-align:center">
  <label>Filtrar por ciudad:
    <select name="filtro" id="filtro" onchange="ver_clientes()">
     <option value="" selected="selected">Todas</option>
      
       <option value="1">Barranquilla</option>
	   <option value="2">Cartagena</option>
	 <option value="3">Monter&iacute;a</option>
	 <option value="4">Santa Marta</option>
	 <option value="5">Sincelejo</option>
	 <option value="6">Valledupar</option>
	 <option value="7">Rioacha</option>
	 <option value="8">C&uacute;cuta</option>
	 <option value="9">Bucaramanga</option>
	 <option value="10">San Andr&eacute;s</option>
	 
    
    </select>
  </label>
</p>




<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>




<form id="edit_cli" name="edit_cli" method="post" action="" >

</form>
<form id="view_cli" name="view_cli" method="post" action="">
 
    
    
</form>

</div>
</body>
</html>