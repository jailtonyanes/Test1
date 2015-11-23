<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();

  session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nomina</title>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">

  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script> 

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>
<script type="text/javascript" src="../_javascript/nomina.js"></script>
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
<h2>Nómina</h2>

    <fieldset style="margin:3px auto;width:400px">
      <input name="gu_c" id="gu_c" type="hidden" class="anchot"></input>
    	<legend>Filtro de liquidación</legend>
     <p style="padding-left:40px">
    <label>
      Ciclo de liquidación:
       <select name="select_c" type="text" id="select_c"  class="anchot" >
              <option value="" selected="selected">Escoja </option> 
              <option value="10" >Década </option> 
              <option value="15" >Quincenal </option> 
              <option value="30" >Mensual </option>               
                           
       </select>
    </label>
    </p>


           <p style="padding-left:126px">
    <label> Desde:
      <input name="fecha" id="fecha" type="text" class="anchot" readonly="readonly">
      </input>
       <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "fecha",

                          dateFormat: "%Y/%m/%d",

                          trigger: "fecha",

                          bottomBar: false,

                          onSelect: function() {

                                 
                                  this.hide();
                                  calcula();
                                  ver_clientes();
                                  saca_gu_em();
                  
                          }
                  });
                </script>
    </label>
  
  </p>
   
   <p style="padding-left:126px">   <label> Hasta:
      <input name="fecha2" id="fecha2" type="text" class="anchot" readonly="readonly">
      </input>

    </label>
  
  </p>
  <p style="padding-left:56px">
 <label> Seccione Guarda:
 <select id="se_gu" name ="se_gu" onchange="ver_clientes()" class="anchot">
 <option value="" selected="selected"> Escoja opción
   
 </option>


</select> 
</label>
</p>

    </fieldset>

<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>




<form id="edit_cli2" name="edit_cli2" method="post" action="" >

</form>
<form id="view_cli" name="view_cli" method="post" action="" style="width:1212px;  overflow-y:hidden;overflow-x:visible; margin:75px auto">
 
    
    
</form>

<table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0" style="display:none">

  
</table>

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
