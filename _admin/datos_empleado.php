  
  <?php
 include('../_include/configuration.php');
  include('../_classes/conectar.php');
  include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();


  $crud->setConsulta("select * from empleado where cedula='$_GET[uid]'");
  $crud->seleccionar();
  $datos_con = $crud->seleccionar($con->getConection());
  $dep = $datos_con[0]['departamento_id'];

?>

  <div id="datos">
       <h2 style="margin-top:5px">Editar</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" class="ancho" />
 
  <p>
    <label>Primer Apellido:
      <input name="apellido_uno" id="apellido_uno" type="text" class="ancho" value="<?php echo $datos_con[0]['apellido1'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>Sugundo Apellido:
      <input name="apellido_dos" id="apellido_dos" type="text" class="ancho" value="<?php echo $datos_con[0]['apellido2'] ?>">
      </input>
    </label>
  
  </p>
 
  <p>
    <label>Primer Nombre:
      <input name="nombre_uno" id="nombre_uno" type="text" class="ancho" value="<?php echo $datos_con[0]['nombre1'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>Segundo Nombre:
      <input name="nombre_dos" id="nombre_dos" type="text" class="ancho" value="<?php echo $datos_con[0]['nombre2'] ?>">
      </input>
    </label>
  
  </p>
  
  <p>
  <label>Cedula:
      <input name="cedula" id="cedula" type="text" class="ancho" value="<?php echo $datos_con[0]['cedula'] ?>">
      </input>
    </label>
  
  </p>
<p>
    
    <label> Departamento:
     
      <select class="ancho" id="departamento_id" name="departamento_id" onchange="javascript:sacar_municipio()">
          <option selected="selected" value="">Escoja opción</option>
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $crud_m = new Crud();
   $crud_m->setConsulta("select departamento_id,departamento_nombre from departamento order by departamento_nombre asc");

   $datos_m = $crud_m->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos_m))
   {   
?>
   <option <?php if($datos_m[$i]['departamento_id']== $datos_con[0]['departamento_id']){ echo 'selected=selected';} ?>  value="<?php echo $datos_m[$i]['departamento_id'] ?>"><?php echo $datos_m[$i]['departamento_nombre'] ?></option>
      

<?php
    $i++;
  }
?>
      
      </select>
    </label>
  
 </p>
  <p>
    <label>
      Seleccione Municipio:
       <select name="select_municipio" type="text" id="select_municipio" class="ancho" >
                 <option selected="selected" value="">Escoja opción</option>
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $crud_m = new Crud();
   $crud_m->setConsulta("select municipio_nombre,municipio_id from municipio where municipio.departamento_id='$dep' order by municipio_nombre asc");

   $datos_m = $crud_m->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos_m))
   {   
?>
   <option <?php if($datos_m[$i]['municipio_id']== $datos_con[0]['municipio_id']){ echo 'selected=selected';} ?>  value="<?php echo $datos_m[$i]['municipio_id'] ?>"><?php echo $datos_m[$i]['municipio_nombre'] ?></option>
      

<?php
    $i++;
  }
?>                        
                          
       </select>
    </label>
    </p>

 <p>


  <p>
    <label>Direcci&oacute;n:
      <input name="direccion" id="direccion" type="text" class="ancho" value="<?php echo $datos_con[0]['direccion'] ?>">
      </input>
    </label>
  
  </p>
<p>
  <label>Barrio:
      <input name="barrio" id="barrio" type="text" class="ancho" value="<?php echo $datos_con[0]['barrio'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>Telefono Fijo:
      <input name="telefono_fijo" id="telefono_fijo" type="text" class="ancho" value="<?php echo $datos_con[0]['telefono_fijo'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>Celular:
      <input name="celular" id="celular" type="text" class="ancho" value="<?php echo $datos_con[0]['celular'] ?>">
      </input>
    </label>
  
  </p>


  <p>
    <label>Email:
      <input name="email" id="email" type="text" class="ancho" value="<?php echo $datos_con[0]['email'] ?>">
      </input>
    </label>
  
  </p>

<p>
    <label>Cargo:
        <select name="cargo" type="text" id="cargo" class="ancho" >
                     
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $crud2 = new Crud();
   $crud2->setConsulta("select reg_id, cargo from salario order by cargo asc");

   $datos2 = $crud2->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos2))
   {   
?>
   <option  <?php if($datos2[$i]['reg_id']== $datos_con[0]['cargo_id']){ echo 'selected=selected';} ?>  value="<?php echo $datos2[$i]['reg_id'] ?>"><?php echo $datos2[$i]['cargo'] ?></option>
      

<?php
    $i++;
  }
?>               
                          
       </select>
    </label>
  
  </p>

    <p>
    <label>Tipo Sangre:
      <input name="tipo_sangre" id="tipo_sangre" type="text" class="ancho" value="<?php echo $datos_con[0]['tipo_sangre'];  ?>">
      </input>
    </label>
  
  </p>


 
 <div id="botonera2">
  <p>
    
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_clientes()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    
  </p>
  </div>
  </div>
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