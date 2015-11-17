<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Despachos</title>
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />

    <link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
    <!-- <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/gold/gold.css" />-->
     <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> 
      <link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/unicode-letter.js"></script>
     <script src="../src/js/lang/es.js"></script>

<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/linea.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
</head>

<body>
  <div id="container">	
	<?php
 include('../_template/main_menu.php');
?>
<h2>Ver Ingresos de Mercanc&iacute;a </h2>



<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>

<form id="edit_mer" name="edit_mer" method="post" action="" style="display:none">
  <div id="datos">
   <h2 style="margin-top:5px">Editar</h2>
   <input type="hidden" name="idenl" id="idenl" />
   <input type="hidden" name="despachoid" id="despachoid" />

 <p>
    <label>* Nro de importaci&oacute;n:
      <select name="impornum" id="impornum" class="ancho2">
       <option value="0" >Escoja Importaci&oacute;n</option>
	   <?php 
	    $query="select * from importacion where importacion_active=1 order by importacion_numero asc";
		$result=mysql_query($query,$connection);
		$num_rows=mysql_num_rows($result);
		if($num_rows>0)
		 {
		   while($row=mysql_fetch_array($result))
		    {
	   ?>
        <option value="<?php echo $row['importacion_id'] ?>" ><?php echo $row['importacion_numero'] ?></option>
    
           <?php 
			 }
		    }
		   ?>
        
      </select>
  </label>
  </p>
  <p>
  <label>* Fecha:
  </label>
  <input name="fecha" type="text" id="fecha" readonly="readonly"  class="ancho"/>
   

  
   </p>
  <p>
    <label>* Nombre  del cliente:
      <select name="marca" id="marca" class="ancho2">
       <option value="0" >Escoja el cliente</option>
	   <?php 
	    $query="select cliente.cliente_id,concat(cliente_nombre,' ',cliente_apellido,' (',marca_nombre,')')as nombres from cliente
left join(marca)on(marca.cliente_id=cliente.cliente_id) where cliente.cliente_active=1 order by nombres asc";
		$result=mysql_query($query,$connection);
		$num_rows=mysql_num_rows($result);
		if($num_rows>0)
		 {
		   while($row=mysql_fetch_array($result))
		    {
	   ?>
        <option value="<?php echo $row['cliente_id'] ?>" ><?php echo $row['nombres'] ?></option>
    
           <?php 
			 }
		    }
		   ?>
        
      </select>
  </label>
  </p>
  
  <p>
    <label>Tipo de mercanc&iacute;a:
      <select name="tipo" id="tipo" class="ancho2">
        
         <?php 
	    $query="select * from mercancia where mercancia_active=1 order by mercancia_nombre asc";
		$result=mysql_query($query,$connection);
		$num_rows=mysql_num_rows($result);
		if($num_rows>0)
		 {
		   while($row=mysql_fetch_array($result))
		    {
	   ?>
        <option value="<?php echo $row['mercancia_id'] ?>" ><?php echo $row['mercancia_nombre'] ?></option>
    
           <?php 
			 }
		    }
		   ?>
      </select>
  </label>
  </p>
<p id="yardal">
    <label>Yardas:
      <input type="text" name="yardas" id="yardas" class="ancho" />
    </label>
  </p>
<p id="metrosl">
    <label>Metros:
      <input type="text" name="metros" id="metros" class="ancho" />
    </label>
  </p>

<p id="cubicajel">
    <label>* Cubicaje:
      <input type="text" name="cubicaje" id="cubicaje"  class="ancho"/>
    </label>
  </p>
<p>
    <label>* Cantidad de  Bultos:
      <input type="text" name="bultos" id="bultos"  class="ancho"/>
    </label>
  </p>
  
   <p id="marcal">
    <label>* Marca de Zapato:
      <select name="marcaz" id="marcaz" class="ancho2">
       <option value="0" >Escoja la marca</option>
	   <?php 
	    $query="select calzadoc_id,calzadoc_marca from calzadoc where calzadoc_active=1 order by calzadoc_marca asc";
		$result=mysql_query($query,$connection);
		$num_rows=mysql_num_rows($result);
		if($num_rows>0)
		 {
		   while($row=mysql_fetch_array($result))
		    {
	   ?>
        <option value="<?php echo $row['calzadoc_id'] ?>" ><?php echo $row['calzadoc_marca'] ?></option>
    
           <?php 
			 }
		    }
		   ?>
        
      </select>
  </label>
  </p>
  <p id="preciol">
    <label>Precio de traida :
      <input name="valoruni" type="text" id="valoruni" readonly="readonly" class="ancho" />
    </label>
  </p>
  <p id="paresl">
    <label>* Cantidad de pares:
      <input type="text" name="pares" id="pares" onKeyPress="return validarnum(event)" class="ancho" />
    </label>
  </p>

 
 
  
  <p>
    <label>* Valor Neto:
      <input type="text" name="valorneto" id="valorneto" class="ancho"  />
    </label>
  </p>
  <p>
    <label>Descuento:
      <input type="text" name="descuento" id="descuento" onKeyPress="return validarnum(event)" class="ancho" />
    </label>
  </p>
   <p>
    <label>Valor Total:
      <input name="total" type="text" id="total" readonly="readonly" class="ancho" />
    </label>
  </p>


  <p>
    <div id="botonera2">
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_despacho()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    </div>
  </p>
</div>
</form>
<form id="view_mer" name="view_mer" method="post" action="">
 
    
    
</form>

<script type="text/javascript">
 function validarnum(e) { // 1
	tecla = (document.all) ? e.keyCode : e.which; // 2

	if (tecla==0) return true; // 3
	if (tecla==8) return true;
 	patron = /[0123456789.,]/; 

	te = String.fromCharCode(tecla); // 5
	return patron.test(te); // 6
}
  //pasar de moneda a decimal
  function mondea_dec(valor)
  {
           var currency = valor; 
           var number = Number(currency.replace(/[^0-9\.]+/g,"")); 
	 	   return number;
  }
</script>
<script type="text/javascript">
$("#pares").keyup(function(event){
        $("#valorneto").val(mondea_dec($("#valoruni").val())*$("#pares").val());
	    $("#total").val(mondea_dec($("#valorneto").val())-mondea_dec($("#descuento").val()));
		//convertimos a valor neto e moneda
		$('#valorneto').formatCurrency();
		$('#valorneto').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		//convertimos total en moneda
		$('#total').formatCurrency();
		$('#total').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		
	});

$("#descuento").keyup(function(event){
     //mondea_dec($("#descuento").val())
	    $("#total").val(mondea_dec($("#valorneto").val())- mondea_dec($("#descuento").val()));
		$('#total').formatCurrency();
		$('#total').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	});

$("#valorneto").keyup(function(event){
        $("#total").val(mondea_dec($("#valorneto").val())-mondea_dec($("#descuento").val()));
	 
	});

$("#cubicaje").keyup(function(event){
        $("#valorneto").val(mondea_dec($("#valoruni").val())*$("#cubicaje").val());
	    $("#total").val($("#valorneto").val()-mondea_dec($("#descuento").val()));
		$('#valorneto').formatCurrency();
		$('#valorneto').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
			$('#total').formatCurrency();
		$('#total').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		//$("#valorneto").focus();
	});




</script>
<script type="text/javascript">
		            $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#descuento").blur(function() {
				$('#formatWhileTypingAndWarnOnDecimalsEnteredNotification').html(null);
				$(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
			})
			.keyup(function(e) {
				var e = window.event || e;
				var keyUnicode = e.charCode || e.keyCode;
				if (e !== undefined) {
					switch (keyUnicode) {
						case 16: break; // Shift
						case 27: this.value = ''; break; // Esc: clear entry
						case 35: break; // End
						case 36: break; // Home
						case 37: break; // cursor left
						case 38: break; // cursor up
						case 39: break; // cursor right
						case 40: break; // cursor down
						case 78: break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
						case 110: break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
						case 190: break; // .
						default: $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
					}
				}
			})
			.bind('decimalsEntered', function(e, cents) {
				var errorMsg = 'Please do not enter any cents (0.' + cents + ')';
				$('#formatWhileTypingAndWarnOnDecimalsEnteredNotification').html(errorMsg);
				log('Event on decimals entered: ' + errorMsg);
			});


			

		});
	</script>

  </container>
</body>
</html>