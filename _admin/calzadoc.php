 

 <?php

  include('../_include/configuration.php');

  $connection=mysql_connect($server,$user,$password);

  mysql_select_db($dbname);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script type="text/javascript" src="../_javascript/jquery.js"></script>

<script type="text/javascript" src="../_javascript/calzado.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>

<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Calzado de Marca</title>

</head>



<body>



<div id="container">

<?php

 include('../_template/main_menu.php');

?>

<div id="content">



<h2>Ingresar Calzado</h2>

<form id="calzado" name="calzado" method="post" action="">

  

<p>

    <label>* Marca:

      <input type="text" name="marca" id="marca" class="ancho" />

    </label>

  </p>

   <p>

    <label>* Costo de Traida:

      <input type="text" name="costo" id="costo" onKeyPress="return validarnum(event)" class="ancho"/>

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
		            $(function() {
			// Format while typing & warn on decimals entered, no cents
			$("#costo").blur(function() {
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