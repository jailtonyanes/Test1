<?php
 session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Servicios</title>
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />

    <link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
    <!-- <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/gold/gold.css" />-->
     <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> 
      <link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/unicode-letter.js"></script>
     <script src="../src/js/lang/es.js"></script>

<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/servicios.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
</head>

<body>
  <div id="container">	
	<?php
 include('../_template/main_menu.php');
?>
<h2>Ver Servicios Prestados </h2>



<script type="text/javascript">
function checkTodos (id,pID) {
 
				   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked')); 
 
   			}
</script>


<form id="view_cli" name="view_cli" method="post" action="">
 
    
    
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