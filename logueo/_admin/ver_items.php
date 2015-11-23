<?php
 session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index2.php");
header("Cache-Control: no-cache, must-revalidate");  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control de Asistencia</title>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/items.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
<!-- Calendario !-->
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />
<link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
<link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/steel/steel.css" />
<script src="../src/js/jscal2.js"></script>
<script src="../src/js/unicode-letter.js"></script>
<script src="../src/js/lang/es.js"></script>
<!-- Fin Calendario !-->
</head>

<body>

<div id="container">
<?php
 include('../_template/main_menu.php');
?>




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