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
<title>Relación Turnos/valores</title>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">

  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script> 

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>
<script type="text/javascript" src="../_javascript/liquiturnos.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<h2>Relación Turnos/Valores</h2>



<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>




<form id="edit_cli" name="edit_cli" method="post" action="" >

</form>
<form id="view_cli" name="view_cli" method="post" action="" style="width:1212px;  overflow-y:hidden;overflow-x:visible; margin:75px auto">
 
    
    
</form>
 <p style="padding-left:600px;">
 <a href="#" class="goTop"><img src="../_images/anchor_up.png" title="Ir al inicio" /></a>
 </p>
<script type="text/javascript">
$('.goTop').click(
      function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }
);
</script>
 
</div>
</body>
</html>
