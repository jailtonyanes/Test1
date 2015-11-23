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
 
   if($_POST['zona']!='46')
   {
     $sentencia="insert into barrio (barrio_nombre,zona_id,barrio_precio)values('$_POST[barrio]','$_POST[zona]','$_POST[precio]')";
   }
   else
   {
     $sentencia="insert into pueblo (pueblo_nombre,pueblo_precio)values('$_POST[barrio]','$_POST[precio]')";
   }   
 
 $query=$sentencia;
  $result=mysql_query($query,$connection);
  if($result)
   {
    echo'Barrio/Pueblo Ingresado Satisfactoriamente.';
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
?>