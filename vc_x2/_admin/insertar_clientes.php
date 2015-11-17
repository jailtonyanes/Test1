<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['cacharro'] = str_replace($moneda, $numero, $_POST['cacharro']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['calzadob'] = str_replace($moneda, $numero, $_POST['calzadob']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['coch'] = str_replace($moneda, $numero, $_POST['coch']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['confeccion'] = str_replace($moneda, $numero, $_POST['confeccion']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['electro'] = str_replace($moneda, $numero, $_POST['electro']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['juguete'] = str_replace($moneda, $numero, $_POST['juguete']);
   
    //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['precio'] = str_replace($moneda, $numero, $_POST['precio']);
 
 $query="insert into usuario(usuario_nombres,usuario_apellidos,usuario_sexo,usuario_fecha_nac,usuario_est_civil,
							 usuario_escolaridad,usuario_profesion,usuario_ciudad,usuario_municipio,usuario_estrato,usuario_tipo_vivienda,usuario_personas_cargo,usuario_cargo,usuario_antiguedad,usuario_cedula,usuario_expedida,usuario_parte)values('$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$_POST[fnac]','$_POST[est_civil]','$_POST[escolaridad]','$_POST[profesion]','$_POST[ciudad]','$_POST[municipio]','$_POST[estrato]','$_POST[vivienda]','$_POST[pcargo]','$_POST[cargo_c]','$_POST[anti]','$_POST[document1]','$_POST[expedition]','1')";
  $result=mysql_query($query,$connection);
  if($result)
   {
        
	    echo'Usuario Ingresado Satisfactoriamente.';
	 
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
?>