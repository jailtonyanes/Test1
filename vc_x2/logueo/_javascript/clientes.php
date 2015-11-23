<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>

<script type="text/javascript" src="../_javascript/clientes.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<script type="text/javascript" src="../_javascript/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../_javascript/jquery.autocomplete.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clientes</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../jquery.autocomplete.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>
<script type="text/javascript">
   jQuery(function($)
   {
      
  
	  //para las fechas
	    $.mask.definitions['a']='[01234567890]';
		 $("#fnac").mask("aaaa-aa-aa");

	  
	  //-----------------
	  
	  
	  
    });
 </script>
 
   <script type="text/javascript">
	 $().ready(function() {
	
     
			//-------------------
		$("#sucursal").autocomplete("get_emplea_list.php",{
	        width: 360,
	        matchContains: true,
	        selectFirst: false,
			
			
		 }
		 
		 );
	

	});
		
	
	</script>
<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu2.php');
    ?>
 <div id="content2">  
<h2 class="datos_cli">Datos del Encuestado</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Nombres:
      <input type="text" name="nombre" id="nombre"  class="ancho_es"/>
    </label>
  </p>
  <p>
    <label>* Apellidos:
      <input type="text" name="apellido" id="apellido" class="ancho_es" />
    </label>
  </p>
    <p>
    <label>* Tipo de documento:
      <input type="text" name="document" id="document" class="ancho_es" />
    </label>
  </p>
   <p>
    <label>* Expedido en:
      <input type="text" name="expedition" id="expedition" class="ancho_es" />
    </label>
  </p>
  <p>
    <label>* Sexo:
     
   
      <select name="sexo" id="sexo" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Masculino</option>
	           <option value="2">Femenino</option>
      </select>
    </label>
  </p>
   <p>
    <label>* Fecha de nacimiento (AAAA-mm-dd):
      <input type="text" name="fnac" id="fnac" class="ancho_es" />
    </label>
  </p>
  <p>
    <label>* Estado Civil:
     
   
      <select name="est_civil" id="est_civil" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Casado</option>
	           <option value="2">Soltero</option>
               <option value="3">Uni&oacute;n libre</option>
               
      </select>
    </label>
  </p>
  <p>
    <label>* Escolaridad:
     
   
      <select name="escolaridad" id="escolaridad" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Bachiller</option>
	           <option value="2">T&eacute;cnico</option>
                <option value="3">Tecn&oacute;logo</option>
	           <option value="4">Profesional</option>
      </select>
    </label>
  </p>
   <p>
    <label>Profesi&oacute;n:
      <input type="text" name="profesion" id="profesion" class="ancho_es" />
    </label>
  </p>
  <p>
    <label>* Ciudad:
     
   
      <select name="ciudad" id="ciudad" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Barranquilla</option>
	           <option value="2">Cartagena</option>
                <option value="3">Monter&iacute;a</option>
	           
               <option value="4">Santamarta</option>
               <option value="5">Sincelejo</option>
               <option value="6">Valledupar</option>
                <option value= "7">Rioacaha</option>
	           
               <option value="8">C&uacute;cuta</option>
               <option value="9">Bucaramanga</option>
               <option value="10">San Andr&eacute;s</option>
      </select>
    </label>
  </p>
   <p>
    <label>Municipio:
      <input type="text" name="municipio" id="municipio" class="ancho_es" />
    </label>
  </p>
   <p>
    <label>Estrato:
      <select name="estrato" id="estrato" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">1</option>
	           <option value="2">2</option>
                <option value="3">3</option>
	           <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
      </select>
    </label>
  </p>
   <p>
    <label>Tipo de vivienda:
      <select name="vivienda" id="vivienda" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Propia</option>
	           <option value="2">Alquilada</option>
                <option value="3">Familiar</option>
	       
      </select>
    </label>
  </p>
   <p>
    <label>personas a cargo:
      <select name="pcargo" id="pcargo" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">1</option>
	           <option value="2">2</option>
                <option value="3">3</option>
	           <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
      </select>
    </label>
  </p>
   <!--<p>
    <label>Sucursal:
      <input type="text" name="sucursal" id="sucursal" class="ancho_es" />
    </label>
  </p> !-->
  <p>
    <label>Cargo que desempe&ntilde;a en la empresa:
      <select name="cargo_c" id="cargo_c" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
      
              <option value="1">Guarda</option>
	           <option value="2">Supervisor</option>
                <option value="3">Escolta</option>
	           <option value="4">Radio Operador</option>
               <option value="5">Adminstrativo</option>
               <option value="6">Programador</option>
                 <option value="7">T&eacute;cnicos instaladores</option>
                 <option value="8">Operador de monitoreo</option>
                
                 
      </select>
    </label>
  </p>
   <p>
    <label>* A&ntilde;os de antiguedad:
     
   
      <select name="anti" id="anti" class="ancho_es">
        <option value="" selected="selected">Escoja opci&oacute;n</option>
       <option value="12">Menos de uno</option>
              <option value="1">1</option>
	           <option value="2">2</option>
                <option value="3">3</option>
	           
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
                <option value= "7">7</option>
	           
               <option value="8">8</option>
               <option value="9">9</option>
               <option value="10">10</option>
               <option value="11">M&aacute;s de Diez</option>
              
               
      </select>
    </label>
  </p>
 
  <p>
    <label>
      <input type="submit" name="guardar" id="guardar" value="Guardar"  class="guarda"/>
    </label>
  </p>
</form>
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
<script type="text/javascript">
		           
				   //cacharro
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#cacharro").blur(function() {
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

	   //calzadob
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#calzadob").blur(function() {
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
				   
	   //coch
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#coch").blur(function() {
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
				   
	   //confeccion
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#confeccion").blur(function() {
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
				   
	   //electro
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#electro").blur(function() {
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
				   
	   //juguete
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#juguete").blur(function() {
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
				   
				   
	   //tela
				   $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#tela").blur(function() {
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

</div>
</div>
</body>
</html>