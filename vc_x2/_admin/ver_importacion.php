<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Importaci&oacute;n</title>
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
     <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/gold/gold.css" />
    <!-- <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> -->

        <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/unicode-letter.js"></script>
     <script src="../src/js/lang/es.js"></script>


<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/importacion.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<h2>Ver Importaci&oacute;n</h2>
<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>


<form id="edit_impor" name="edit_impor" method="post" action="" style="display:none" >
  <div id="datos">
     <h2 style="margin-top:5px">Editar</h2>
    <input type="hidden" name="imporid" id="imporid"  />
 
   <p>
    <label>* Nro de importaci&oacute;n:
      <input type="text" name="impornum" id="impornum"  class="ancho"/>
    </label>
  </p>
   <p>
  <label>* Fecha de salida:
  </label>
  <input name="fecha" type="text" id="fecha" readonly="readonly" />
     <button id="fecha1" type="button" name="fecha1" class="boton_fecha">...</button>
                
                <script type="text/javascript">
                  RANGE_CAL_1 = new Calendar({
                          inputField: "fecha",
                          dateFormat: "%Y-%m-%d",
                          trigger: "fecha1",
                          bottomBar: false,
                          onSelect: function() {
                                 // var date = Calendar.intToDate(this.selection.get());
                                 // LEFT_CAL.args.min = date;
                                //  LEFT_CAL.redraw();
                                  this.hide();
                          }
						
                  });
              
                </script>

  
   </p>
 <p>
  <label>* Fecha de llegada:
  </label>
  <input name="fechalleg" type="text" id="fechalleg" readonly="readonly" />
    <button id="fecha2" type="button" name="fecha2" class="boton_fecha">...</button>
                
                <script type="text/javascript">
                  RANGE_CAL_2 = new Calendar({
                          inputField: "fechalleg",
                          dateFormat: "%Y-%m-%d",
                          trigger: "fecha2",
                          bottomBar: false,
                          onSelect: function() {
                                 // var date = Calendar.intToDate(this.selection.get());
                                  //LEFT_CAL.args.min = date;
                                 // LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
              
                </script>

 </p>
  
<p>

<label>Fecha de levante:
  </label>
  <input name="fechalev" type="text" id="fechalev" readonly="readonly" />
    <button id="fecha3" type="button" name="fecha3" class="boton_fecha">...</button>
                
                <script type="text/javascript">
                  RANGE_CAL_2 = new Calendar({
                          inputField: "fechalev",
                          dateFormat: "%Y-%m-%d",
                          trigger: "fecha3",
                          bottomBar: false,
                          onSelect: function() {
                                 // var date = Calendar.intToDate(this.selection.get());
                                  //LEFT_CAL.args.min = date;
                                 // LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
              
                </script>

</p>

  <p>
     <div id="botonera2">
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_calzado()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    </div>
  </p>
</div>
</form>

<form id="view_impor" name="view_impor" method="post" action="">
 
    
    
</form>
</div>

</body>
</html>