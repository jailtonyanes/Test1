<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


  session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Turnos</title>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>
<script type="text/javascript" src="../_javascript/analizar_t.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<br/>
<h2 id="anuncio">Ver turnos</h2>
<h2 id="anuncio2" style="display:none">Información del turno</h2>


<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>



 <script type="text/javascript">

 function validarnum(e) { // 1

	tecla = (document.all) ? e.keyCode : e.which; // 2



	if (tecla==0) return true; // 3

	if (tecla==8) return true;

 	patron = /[0123456789]/; 



	te = String.fromCharCode(tecla); // 5

	return patron.test(te); // 6

}

</script>


<form id="analisis" name="analisis" method="post" action=""  >

</form>
<form id="view_cli" name="view_cli" method="post" action="">
 
    
    
</form>

</div>
</body>
</html>