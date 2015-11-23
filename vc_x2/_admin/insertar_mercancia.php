<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  if($_POST['tipo']!=13)
  {
    $calzado=24;
	$pares='N/A';
	$cubicaje=$_POST['cubicaje'];
	$yardas=$_POST['yardas'];
	$metros=$_POST['metros'];
  }
  else
  {
     $calzado=$_POST['marcaz'];
	 $pares=$_POST['pares'];
	 $cubicaje='N/A';
	 $yardas='N/A';
	 $metros='N/A';
  }
  
  //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['valoruni'] = str_replace($moneda, $numero, $_POST['valoruni']);
  //
  //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['valorneto'] = str_replace($moneda, $numero, $_POST['valorneto']);
  //
  //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['descuento'] = str_replace($moneda, $numero, $_POST['descuento']);
  //
  //pasando de moneda a numero para guardar en la base de datos 
   $moneda = array("$", ".", ",");
   $numero = array("", "", "");
   $_POST['total'] = str_replace($moneda, $numero, $_POST['total']);
  //
  
  $query="insert into linea(linea_cubicaje,par,valor_traida,valor_total,fecha,valor_neto,descuento,linea_bultos,linea_yarda,linea_metros)
  values('$cubicaje','$pares','$_POST[valoruni]','$_POST[total]','$_POST[fecha]','$_POST[valorneto]','$_POST[descuento]','$_POST[bultos]','$yardas','$metros')";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Item ingresado exitosamente.';
     //saco el id de la ultima linea
	 $id= mysql_insert_id();
	 //relacion de cliente con linea
	 $query2="insert into cliente_linea(cliente_id,linea_id)values('$_POST[marca]','$id')";
	 $result2=mysql_query($query2,$connection);
     //relacion de linea con importacion 
	 $query3="insert into importacion_linea(importacion_id,linea_id)values('$_POST[impornum]','$id')";
	 $result3=mysql_query($query3,$connection);
	 //relacion de linea con mercancia
	  $query4="insert into linea_mercancia(mercancia_id,linea_id)values('$_POST[tipo]','$id')";
	 $result4=mysql_query($query4,$connection);
	 //relacion de linea con calzado
	  $query5="insert into calzadoc_linea(calzadoc_id,linea_id)values('$calzado','$id')";
	 $result5=mysql_query($query5,$connection);
   
   }

  mysql_close($connection);
  
?>