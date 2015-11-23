<?php 
 session_start();
  if(isset($_SESSION['user_authorized'])) {session_destroy();}
 include('_include/configuration.php');
 if(isset($_SESSION['user_authorized'])) {session_destroy();}
?>
<?php
 if(isset($_POST['login2']) )
 { 
    $connection=mysql_connect($server,$user,$password);
	mysql_select_db($dbname);
	$pass= $_POST['password'];
	$query=" SELECT nombre1,nombre2, apellido1, apellido2,cedula  FROM empleado where nombre1 = '$_POST[usuario]' and cedula ='$pass' and admin='1' ";
	$result=mysql_query($query,$connection);
	if($result){
	  $num_rows=mysql_num_rows($result);
	  if($num_rows>0){
		    $row=mysql_fetch_array($result);
			$_SESSION['user_authorized'] = true;
			$_SESSION['nombre1'] = $row['nombre1'];
			$_SESSION['nombre2'] = $row['nombre2'];
		    $_SESSION['apellido1'] = $row['apellido1'];
		    $_SESSION['apellido2'] = $row['apellido2'];
			
		         
	         	  
		         header("Location: _admin/ver_items.php");
			 
			    
			   
		 }
		 else
		 {
		 ?>
           <script type="text/javascript">
            alert("Usuario o Contraseña Incorrectos");
           </script>
		 <?php
		 }
	}
	else
	{
	// echo mysql_error();
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
   
   <img src="_images/1317501716_Program-Group.png" width="70" height="70" alt="folder" /></div>
  
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