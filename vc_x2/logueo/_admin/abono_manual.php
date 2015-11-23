<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/abono_manual.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Realizar Abono</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu.php');
    ?>
 <div id="content">  
<h2 class="datos_cli">Realizar Abono</h2>


<form id="manual" name="manual" method="post" action="">
    <p>
    <label>* Nombre del cliente:
     
   
      <select name="cliente" id="cliente" class="ancho2">
        <option value="0" selected="selected">Escoja Cliente</option>
        <?php
		 $query="SELECT cliente.cliente_nombre, cliente.cliente_apellido, marca.marca_nombre, cliente.cliente_id
FROM cliente INNER JOIN marca ON cliente.cliente_id = marca.cliente_id
ORDER BY marca.marca_nombre;
";
		 $result=mysql_query($query,$connection);
		 $num_rows=mysql_num_rows($result);
		 if($num_rows>0){
		  while($row=mysql_fetch_array($result))
		   {
		  ?>
              <option value="<?php echo $row['cliente_id'] ?>"><?php echo $row['cliente_nombre'].' '.$row['cliente_apellido'].' ('.$row['marca_nombre'].')'; ?></option>
		  <?php 
		   }
		 }
		 mysql_close($connection);
		?>
      </select>
    </label>
  </p>
 
 <p>
    <label>* Escoga Factura:
     
   
      <select name="factura" id="factura" class="ancho2">
        
      </select>
    </label>
  </p>
 
  <p>
    <label>* Valor a pagar:
      <input name="vpagar" type="text"  class="ancho" id="vpagar" readonly="readonly"/>
    </label>
  </p>
  <p>
    <label>* Abono:
      <input type="text" name="abono" id="abono" class="ancho"  onKeyPress="return validarnum(event)"/>
    </label>
  </p>
  
 <p>
    <label>* Saldo:
      <input type="text" name="saldo" id="saldo" class="ancho" />
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
			$("#abono").blur(function() {
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
 //pasar de moneda a decimal
 function mondea_dec(valor)
  {
           var currency = valor; 
           var number = Number(currency.replace(/[^0-9\.]+/g,"")); 
	 	   return number;
  }
   
   
   $("#abono").keyup(function(event){
        $("#saldo").val(mondea_dec($("#vpagar").val())-mondea_dec($("#abono").val()));
		//convertimos a valor neto e moneda
		$('#abono').formatCurrency();
		$('#abono').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		//convertimos total en moneda
		$('#vpagar').formatCurrency();
		$('#vpagar').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		
		$('#saldo').formatCurrency();
		$('#saldo').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		
	});
</script>
</div>
</div>
</body>
</html>