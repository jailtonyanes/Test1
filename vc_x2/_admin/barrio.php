<?php
    session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/barrio.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Barrios</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  <?php 
     include('../_template/main_menu.php');
    ?>
  <div id="content">  
  <h2 class="datos_cli">Datos del Barrio</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Zona:
     
   
      <select name="zona" id="zona" class="ancho2">
        <option value="0" selected="selected">Escoja Zona</option>
        <?php
		 $query="select zona_id,zona_nombre,zona_municipio from zona order by zona_municipio,zona_nombre";
		 $result=mysql_query($query,$connection);
		 $num_rows=mysql_num_rows($result);
		 if($num_rows>0){
		  while($row=mysql_fetch_array($result))
		   {
		     if($row['zona_municipio']==1)
			  {
			   $mun='Barranquilla';
			  }
			  else
			  {
			    if($row['zona_municipio']==2)
			    {
			     $mun='Soledad';
			    }
				else
				{
				 $mun='Pueblos';
				}
			  }
		  ?>
              <option value="<?php  echo $row['zona_id'] ?>" ><?php echo 'Zona '.$row['zona_nombre'].' ('.$mun.')'; ?></option>
		  <?php 
		   }
		 }
		 mysql_close($connection);
		?>
      </select>
    </label>
  </p>
  <p>
    <label>* Nombre del barrio/pueblo:
      <input type="text" name="barrio" id="barrio"  class="ancho"/>
    </label>
  </p>
  <p id="price" >
    <label>* Precio:
      <input type="text" name="precio" id="precio"  class="ancho" onkeypress="return validarnum(event)"/>
    </label>
  </p>
 
 
  
 
 
  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar"  class="guarda"/>
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
			$("#precio").blur(function() {
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