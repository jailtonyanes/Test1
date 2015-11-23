<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver L&iacute;nea</title>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/mercancia.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<h2>Ver L&iacute;nea</h2>
<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>

<form id="edit_mer" name="edit_mer" method="post" action="" >

</form>
<form id="view_mer" name="view_mer" method="post" action="">
 
    
    
</form>

</div>
</body>
</html>