<?php 
    include('_include/configuration.php');
  include('_classes/conectar.php');
  include('_classes/crud.php');

  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();
 session_start();
  if(isset($_SESSION['user_authorized'])) {session_destroy();}

 if(isset($_SESSION['user_authorized'])) {session_destroy();}
?>
<?php
 if(isset($_POST['login2']) )
 { 
    
	$crud->setConsulta(" SELECT * from usuario WHERE usuario_nick ='$_POST[usuario]' AND usuario_password='$_POST[password]' and usuario_active='1'");
    $datos1 = $crud->seleccionar($con->getConection());
	
	if($crud-> getTuplas()>0)
	{
			$_SESSION['user_authorized'] = true;
			$_SESSION['nombre'] = $datos1[0]['usuario_nombre'];;
			$_SESSION['apellido'] = $datos1[0]['usuario_apellido'];
		    $_SESSION['password'] = $datos1[0]['usuario_password'];
		    $_SESSION['nick'] = $datos1[0]['usuario_nick'];
		    $_SESSION['tipo'] = $datos1[0]['usuario_tipo'];
		    
		    header("Location: _admin/crear_turnos.php"); 
	       
	}
	else
	{
  ?>
      <script type="text/javascript">
      alert('Usuario o Password Incorrectos');
      </script>
   <?php
    }
 }
 ?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="screen.css" rel="stylesheet" type="text/css" media="all" />
<title>Control Interno de Facturaci&oacute;n de  Taxis</title>
</head>

<body>
<div id="container2">
   <div id="folder">
   
   <img src="_images/cartera.png" width="70" height="70" alt="folder" /></div>
  
  <div id="back">
   <h2>Ingreso de Usuarios </h2>
  </div>
 <form id="login" name="login" method="post" action=" ">
     <p>
       <label for="usuario">Usuario</label>
       <br /> 
         <input type="text" name="usuario" id="usuario" />
      
     </p>
     <p>
       <label for="password">Contrase&ntilde;a </label>
       <br />
         <input type="password" name="password" id="password" />
      
     </p>
     <p>
       <label>
         <input type="submit" name="login2" id="login2" value="Ingresar" />
       </label>
     </p>
   </form>
   
</div>
</body>
</html>