<?php 
 session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="screen.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="_javascript/jquery.js"></script>
<script type="text/javascript" src="_javascript/ingreso_clientes.js"></script>
<title>Control de Asistencia</title>
</head>

<body>
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
<div id="container2">
   <div id="folder">
   
   <img src="_images/employ.png" width="70" height="70" alt="folder" /></div>
  
  <div id="back">
   <h2>Ingreso de Empleados </h2>
  </div>
 <form id="login" name="login" method="post" action=" ">
     <p>
       <label for="usuario">Digite su C&eacute;dula</label>
       <br /> 
         <input type="text" name="usuario" id="usuario" onKeyPress="return validarnum(event)" />
      
     </p>
     
     <p>
       <label>
         <input type="button" name="login2" id="login2" value="Ingresar" />
       </label>
     </p>
   </form>
   
</div>
</body>
</html>