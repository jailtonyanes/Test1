<?php
  session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');

     $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();
  $crud->setConsulta("select turno_nombre,turno_descripcion,dias_laborales,dias_descanso,
dtd,r_ini_d,r_fin_d,dtn,r_ini_n,r_fin_n,tp_jornada,inicio_turno from turno where turno_id='$_GET[uid]'");

   $datos = $crud->seleccionar($con->getConection());

?>

<script type="text/javascript">
   jQuery(function($)
   {
      
  
	  //para las fechas
	    $.mask.definitions['a']='[01234567890]';
		 $("#inidia").mask("aa:aa");
		 $("#findia").mask("aa:aa");
		 $("#ininoche").mask("aa:aa");
		 $("#finnoche").mask("aa:aa");

	  

	  
	  
	  
    });
 </script>

  <div id="datos">
     
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" class="ancho" />
 <fieldset class="field_analisis">
 	 <legend>Informaci&oacute;n B&aacute;sica</legend>
  <p>
    <label> Nombre:
      <input name="nombre"  id="nombre" type="text" class="ancho" value="<?php echo  $datos[0]['turno_nombre'] ?>">
      </input>
    </label>
  
  </p>
<p>
    <label> Descripci&oacute;n:
      <input name="descrip"  id="descrip" type="text" class="ancho" value="<?php echo $datos[0]['turno_descripcion'] ?>" >
      </input>
    </label>
  
  </p>
  
 <p>
    <label> D&iacute;as de trabajo diurno:
      <input name="dtd" id="dtd" type="text"  value="<?php echo $datos[0]['dtd'] ?>"  class="ancho" onKeyUp="javascript:sumar()" onKeyPress="return validarnum(event)" >
      </input>
    </label>
  
  </p>
  <p style="padding-right:140px;">
    <label> Rango:
      <input name="inidia" id="inidia" type="text"  class="anhora" value="<?php echo $datos[0]['r_ini_d'] ?>" >
      </input>
      <input name="findia" id="findia" type="text"  class="anhora" value="<?php echo $datos[0]['r_fin_d'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label> D&iacute;as de trabajo nocturno:
      <input name="dtn" id="dtn" type="text"  value="<?php echo $datos[0]['dtn'] ?>" class="ancho" onKeyUp="javascript:sumar()" onKeyPress="return validarnum(event)">
      </input>
    </label>
  
  </p>
<p style="padding-right:140px;">
    <label> Rango:
      <input name="ininoche" id="ininoche"  type="text" class="anhora" value="<?php echo $datos[0]['r_ini_n'] ?>" >
      </input>
      <input name="finnoche" id="finnoche"  type="text" class="anhora" value="<?php echo $datos[0]['r_fin_n'] ?>" >
      </input>
    </label>
  
  </p>
  <p>
    <label> D&iacute;as de descanso:
      <input name="dd" id="dd" type="text"  value="<?php echo $datos[0]['dias_descanso'] ?>" class="ancho" onKeyPress="return validarnum(event)">
      </input>
    </label>
  
  </p>
  <p >
    <label> D&iacute;as laborados:
      <input name="dl" id="dl" type="text" readonly="readonly"  class="ancho"  value="<?php echo $datos[0]['dias_laborales'] ?>">
      </input>
    </label>
  
  </p>
   <p>
    <label> Tipo de inicio de turno:
     <select id="tipo_inicio" name="tipo_inicio"  class="ancho">
        <option value="" selected="selected">Escoja Opci&oacute;n</option>
        <option <?php if($datos[0]['inicio_turno']==1){echo 'selected=selected';} ?> value="1">Diurno</option>
        <option <?php if($datos[0]['inicio_turno']==2){echo 'selected=selected';} ?> value="2">Nocturno</option>
     </select>
    </label>
  
  </p>
     <p>
    <label> Tipo de jornada:
     <select id="tp_j" name="tp_j" class="ancho" >
        <option value="" selected="selected">Escoja Opci&oacute;n</option>
        <option <?php if($datos[0]['tp_jornada']==12){echo 'selected=selected';} ?> value="12">12 Hrs</option>
        <option <?php if($datos[0]['tp_jornada']==10){echo 'selected=selected';} ?> value="10">10 Hrs</option>
        <option <?php if($datos[0]['tp_jornada']==8){echo 'selected=selected';} ?> value="8">8 Hrs</option>
        
     </select>
    </label>
  
  </p>
 </fieldset>
  <!-- <fieldset class="field_analisis">
 	 <legend>Relaci&oacute;n Hombres/Horas de trabajo</legend>
  <p>
    <label> Hrs Trab: Dt * Jor lab:
      <input name="nombre2"  id="nombre2" type="text" class="ancho" value="<?php echo $datos[0]['tp_jornada'] * $datos[0]['dias_laborales']; ?>">
      </input>
    </label>
  
  </p>
  <p>
    <label> Genera extras:
      <input name="extras" readonly="readonly" id="extras" type="text" class="ancho" value="<?php if((($datos[0]['tp_jornada'] * $datos[0]['dias_laborales'])/($datos[0]['dias_laborales']+$datos[0]['dias_descanso']))<=8){ echo 'No';}else{echo 'Si';} ?>">
      </input>
    </label>
  
  </p>
<p>
    <label> Raz&oacute;n Horas/D&iacute;as :
      <input name="descrip2" readonly="readonly" id="descrip2" type="text" class="ancho" value="<?php echo ($datos[0]['tp_jornada'] * $datos[0]['dias_laborales'])/($datos[0]['dias_laborales']+$datos[0]['dias_descanso']) ?>" >
      </input>
    </label>
  
  </p>
  





  <p>
    <label> Guardas Titulares:
      <input name="dd2" id="dd2" type="text" readonly="readonly" value="<?php echo 24/$datos[0]['tp_jornada'] ?>" class="ancho" onKeyPress="return validarnum(event)">
      </input>
    </label>
  
  </p>
  <p >
    <label> Guardas relevo:
      <input name="dl2" id="dl2" type="text" readonly="readonly" class="ancho" readonly="readonly" value="<?php echo 1 ?>">
      </input>
    </label>
  

 </fieldset>
 --> <!--  <fieldset class="field_analisis">
 	 <legend>Valores de referencia para liquidaci&oacute;n</legend>
 
  <p>
    <label> Salario Base:
      <input name="salbase"    id="salbase" type="text" class="ancho_der" onKeyPress="return validarnum(event)"  onKeyUp=" javascript:calcula_recargo()">
      </input>
    </label>
  
  </p>
   <p>
    <label> Subsidio de transporte:
      <input name="sub_tr" readonly="readonly" id="sub_tr" type="text" class="ancho_der" >
      </input>
    </label>
  
  </p>

  <p>
    <label> HOD:
      <input name="hod" readonly="readonly" id="hod" type="text" class="ancho_der" >
      </input>
    </label>
  
  </p>
<p>
    <label> HORN:
      <input name="horn" readonly="readonly" id="horn" type="text" class="ancho_der"  >
      </input>
    </label>
  
  </p>
  
 <p>
    <label> HED:
      <input name="hed" id="hed" type="text" readonly="readonly"  class="ancho_der" onKeyUp="javascript:sumar()" onKeyPress="return validarnum(event)" >
      </input>
    </label>
  
  </p>

  <p>
    <label> HEN:
      <input name="hen" id="hen" type="text" readonly="readonly"  class="ancho_der" onKeyPress="return validarnum(event)">
      </input>
    </label>
  
  </p>


  <p>
    <label> HODD:
      <input name="hodd" id="hodd" type="text" readonly="readonly"  class="ancho_der" onKeyPress="return validarnum(event)">
      </input>
    </label>
  
  </p>

   <p>
    <label> HRND:
      <input name="hrdn" readonly="readonly" id="hrdn" type="text" class="ancho_der" >
      </input>
    </label>
  
  </p>
<p>
    <label> HEDD:
      <input name="hedd" readonly="readonly" id="hedd" type="text" class="ancho_der"  >
      </input>
    </label>
  
  </p>
  
 <p>
    <label> HEDN:
      <input name="hedn" id="hedn" type="text" readonly="readonly"   class="ancho_der" onKeyUp="javascript:sumar()" onKeyPress="return validarnum(event)" >
      </input>
    </label>
  
  </p>






  

 </fieldset> -->
 <div id="botonera2">
  <p>
    
      <input type="button" name="up" id="up" value="Actualizar" onclick="javascript:modificar_clientes()"/>
      <input type="button" name="close" id="close" value="Cerrar" onclick="javascript:cerrar()"/>
    
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