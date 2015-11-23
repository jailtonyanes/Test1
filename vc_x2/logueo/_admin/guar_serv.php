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
   $_POST['price'] = str_replace($moneda, $numero, $_POST['price']);
  // date_default_timezone_set("America/Bogota");
  $fecha = date('Y-m-d H:i:s');
$nuevafecha = strtotime ( '-5 hour' , strtotime ( $fecha ) ) ;
 $nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );
  $direct=$_POST['dest'].' '.$_POST['dir'];
      $sentencia="insert into servicio (zona_pub_id,fecha,cupo,conductor_id,direccion,precio)values('$_POST[zone]','$nuevafecha','$_POST[cupo]','$_POST[movil]','$direct','$_POST[price]')";
 
	
 
 $query=$sentencia;
  $result=mysql_query($query,$connection);
  if($result)
   {
    echo'Servicio Guardado Exitosamente.';
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
?>