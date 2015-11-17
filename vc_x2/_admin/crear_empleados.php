<?php
   session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
 
  include('../_include/configuration.php');
  include('../_classes/conectar.php');
  include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/empleado.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Empleado </title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  <?php 
     include('../_template/main_menu.php');
    ?>
  <div id="content" style="width:600px">  
  <h2 class="datos_cli">Crear Empleados</h2>

  <form  name=	"sub" id="sub" method="post" enctype="multipart/form-data">
     
  <fieldset style="width:450px; margin:0px auto ">
  	<legend>Infromación personal &nbsp;&nbsp;<a style="cursor:pointer" title="Desplegar" onclick="javascript:abrir('per')" >&nbsp;&nbsp;+</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a style="cursor:pointer" title="Plegar" onclick="javascript:cerrar('per')">-&nbsp;&nbsp;</a></legend>
  <div id="per">
  <p>
    <label>Primer Apellido:
      <input name="apellido_uno" id="apellido_uno" type="text" class="ancho">
      </input>
    </label>
  
  </p>

  <p>
    <label>Sugundo Apellido:
      <input name="apellido_dos" id="apellido_dos" type="text" class="ancho">
      </input>
    </label>
  
  </p>
 
  <p>
    <label>Primer Nombre:
      <input name="nombre_uno" id="nombre_uno" type="text" class="ancho">
      </input>
    </label>
  
  </p>

  <p>
    <label>Segundo Nombre:
      <input name="nombre_dos" id="nombre_dos" type="text" class="ancho">
      </input>
    </label>
  
  </p>
  
  <p>
  <label>Cedula:
      <input name="cedula" id="cedula" type="text" class="ancho">
      </input>
    </label>
  
  </p>
<p>
    
    <label> Departamento:
     
      <select class="ancho" id="departamento_id" name="departamento_id" onchange="javascript:sacar_municipio()">
          <option selected="selected" value="">Escoja opción</option>
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("select departamento_id,departamento_nombre from departamento order by departamento_nombre asc");

   $datos = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos))
   {   
?>
   <option  value="<?php echo $datos[$i]['departamento_id'] ?>"><?php echo $datos[$i]['departamento_nombre'] ?></option>
      

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
                          
                          
       </select>
    </label>
    </p>

 <p>


  <p>
    <label>Direcci&oacute;n:
      <input name="direccion" id="direccion" type="text" class="ancho">
      </input>
    </label>
  
  </p>
<p>
  <label>Barrio:
      <input name="barrio" id="barrio" type="text" class="ancho">
      </input>
    </label>
  
  </p>

  <p>
    <label>Telefono Fijo:
      <input name="telefono_fijo" id="telefono_fijo" type="text" class="ancho">
      </input>
    </label>
  
  </p>

  <p>
    <label>Celular:
      <input name="celular" id="celular" type="text" class="ancho">
      </input>
    </label>
  
  </p>


  <p>
    <label>Email:
      <input name="email" id="email" type="text" class="ancho">
      </input>
    </label>
  
  </p>

  <p>
    <label>Cargo:
        <select name="cargo" type="text" id="cargo" class="ancho" >
                     <option selected="selected" value="">Escoja opción</option>
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $crud2 = new Crud();
   $crud2->setConsulta("select reg_id, cargo from salario order by cargo asc");

   $datos2 = $crud2->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos2))
   {   
?>
   <option  value="<?php echo $datos2[$i]['reg_id'] ?>"><?php echo $datos2[$i]['cargo'] ?></option>
      

<?php
    $i++;
  }
?>               
                          
       </select>
    </label>
  
  </p>

    <p>
    <label>Tipo Sangre:
      <input name="tipo_sangre" id="tipo_sangre" type="text" class="ancho">
      </input>
    </label>
  
  </p>
  </div>

 </fieldset>





     <input type="submit" name="save_emp" id="save_emp" value="Guardar Empleado" style="   margin-bottom: 15px;
    margin-left: 217px;">
      </form>
      </div>
 </div>    
 
  



  

 

<!-- !-->






    
 

 
 
 
  

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
