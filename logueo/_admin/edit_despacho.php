<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  if($_POST['tipo']==13)
  {
    $cubicaje='N/A';
	$pares=$_POST['pares'];
	$zapato=$_POST['marcaz'];
	 $yardas='N/A';
		  $metros='N/A';
	
  }
  else
  {
     if($_POST['tipo']!=15){
	  $cubicaje=$_POST['cubicaje'];
      $pares='N/A';
      $zapato='24';
	   $yardas='N/A';
		  $metros='N/A';
	 
	 }
	 else{
	  if($_POST['tipo']!=15){
	      $cubicaje=$_POST['cubicaje'];
		  $pares='N/A';
		  $zapato='24';
		  $yardas=$_POST['yardas'];
		  $metros=$_POST['metros'];
		 
	  }
	}
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
  
  $query="update linea set linea_cubicaje='$cubicaje',par='$pares',valor_traida='$_POST[valoruni]',valor_total='$_POST[total]',fecha='$_POST[fecha]',valor_neto='$_POST[valorneto]',descuento='$_POST[descuento]',linea_yarda='$yardas',linea_metros='$metros',linea_bultos='$_POST[bultos]' where linea_id='$_POST[despachoid]'";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Item Editado exitosamente.';
     //saco el id de la ultima linea
	 $id= mysql_insert_id();
	 //relacion de cliente con linea
	 $query2="update cliente_linea set cliente_id= '$_POST[marca]' where linea_id='$_POST[despachoid]'";
	 $result2=mysql_query($query2,$connection);
     //relacion de linea con importacion 
	 $query3="update importacion_linea set importacion_id='$_POST[impornum]' where linea_id='$_POST[despachoid]'";
	 $result3=mysql_query($query3,$connection);
	 //relacion de linea con mercancia
	  $query4="update linea_mercancia  set mercancia_id= '$_POST[tipo]' where linea_id='$_POST[despachoid]'";
	 $result4=mysql_query($query4,$connection);
	 //relacion de linea con calzado
	  $query5="update calzadoc_linea set calzadoc_id= '$zapato' where linea_id='$_POST[despachoid]'";
	 $result5=mysql_query($query5,$connection);
   
   
   }

  mysql_close($connection);
  
?>
