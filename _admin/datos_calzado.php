  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

   $query="select * from calzadoc where calzadoc_id='$_GET[uid]'";
 $result=mysql_query($query,$connection);
 if($result)
 {
  $row=mysql_fetch_array($result);
 }
 mysql_close($connection);
?>
  <div id="datos">
   <h2 style="margin-top:5px">Editar</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" />
   <p>
    <label>* Marca:
      <input type="text" name="marca" id="marca"value="<?php echo $row['calzadoc_marca']; ?>" class="ancho" />
    </label>
  </p>
  <p>
    <label>* Precio de Traida:
      <input type="text" name="precio" id="precio"value="<?php echo $row['calzadoc_valor']; ?>" class="ancho" />
    </label>
  </p>

  <p>
      <div id="botonera2">
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_calzado()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    </div>
  </p>
  </div>
  
  <script type="text/javascript">
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
	</script>