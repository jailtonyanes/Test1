
 <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
     <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/gold/gold.css" />
    <!-- <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> -->

        <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/unicode-letter.js"></script>
     <script src="../src/js/lang/es.js"></script>
   
    

<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/importacion.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Importaci&oacute;n</title>
</head>

<body>
<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<div id ="content">
<h2>Ingresar Importaci&oacute;n</h2>
<form id="importacion" name="importacion" method="post" action="">
  
<p>
    <label>* Nro de  importación:
      <input type="text" name="impornum" id="impornum"   class="ancho"/>
    </label>
  </p>
 <p>
  <label>* Fecha de salida:
  </label>
  <input name="fecha" type="text" id="fecha" readonly="readonly"  />
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
  <input name="fechalleg" type="text" id="fechalleg" readonly="readonly"  />
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

<label> Fecha de levante:
  </label>
  <input name="fechalev" type="text" id="fechalev" readonly="readonly"  />
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
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar" class="guarda" />
    </label>
  </p>
</form>
</div>
</div>
</body>
</html>