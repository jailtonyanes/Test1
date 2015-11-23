
<?php
 include('../_include/configuration.php');

  $connection=mysql_connect($server,$user,$password);

  mysql_select_db($dbname);

   // header("Cache-Control: no-cache, must-revalidate"); 

if($_GET['condition']=='')
 {
  $condition="WHERE usuario.usuario_parte >= '1'";
 }
 else
  {
    
   $condition=" WHERE usuario_ciudad = '$_GET[condition]' AND usuario.usuario_parte >= '1' ";
  }
?>

 

   <!-- Clientes sin marca asignada  -->

 
  



    
<?php
//total de personas que han presentado la encuesta
   $query1="SELECT COUNT(usuario_ciudad) as
   
   t FROM usuario $condition  ";
$result1=mysql_query($query1,$connection);
$row1=mysql_fetch_array($result1);
?>

<p style="text-align:center">Personas que han presentado la encuesta:  <?php echo $row1['t']; $pres=$row1['t']?></p>

<div id="presentaron" style=" height: 200px;
    margin: 10px auto;
    overflow: auto;
    width: 631px;">


 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     
    <th class="margen_der_abj">Nro.</th>
    <th class="margen_der_abj">C&eacute;dula</th>

   <th class="margen_der_abj">Apellidos</th> 

    
     <th class="margen_der_abj">Nombres</th>
   <th class="margen_der_abj">Ciudad</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres



  $query="SELECT usuario_cedula,usuario_apellidos,usuario_nombres,CASE `usuario`.`usuario_ciudad` WHEN '1' THEN 'Barranquilla' 
WHEN '2' THEN 'Cartegena' WHEN '3' THEN 'Monter&iacute;a' WHEN '4' THEN 'Santa Marta' 
WHEN '5' THEN 'Sincelejo' WHEN '6' THEN 'Valledupar' WHEN '7' THEN 'Rioacha' WHEN '8' 
THEN 'C&uacute;cuta' WHEN '9' THEN 'Bucaramanga' WHEN '10' THEN 'San Andr&eacute;s' END AS ciudad
FROM usuario $condition ORDER BY  ciudad,usuario_nombres  ASC 

";

 $result=mysql_query($query,$connection);

 $num_rows=mysql_num_rows($result);

 if($num_rows>0){

	 $i=1;

	 while($row=mysql_fetch_array($result))

	   {

	

  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $i; ?></td>

    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_cedula'] ?></td>
   <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_apellidos'] ?></td> 
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_nombres'] ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['ciudad'] ?></td>
    
     

  

  <?php

        $i++;

	   }

	  

	 }



  ?>

</table>
</div>
 

<?php

if($_GET['condition']=='')
 {
  $condition="WHERE usuario.usuario_parte >= '36'";
 }
 else
  {
    
   $condition=" WHERE usuario_ciudad = '$_GET[condition]' AND usuario.usuario_parte >= '36' ";
  }
?>

<?php
//total de personas que  terminaron la encuesta
 $query1="SELECT count(usuario_cedula) as t
FROM usuario $condition  ORDER BY usuario_nombres ASC

";
$result1=mysql_query($query1,$connection);
$row1=mysql_fetch_array($result1);
?>
<p style="text-align:center">Personas que terminaron  la encuesta:  <?php echo $row1['t']; $ter=$row1['t'];  ?></p>
 

<div id="terminaron2" style=" height: 200px;
    margin: 10px auto;
    overflow: auto;
    width: 631px;">


 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     
    <th class="margen_der_abj">Nro.</th>
    <th class="margen_der_abj">C&eacute;dula</th>

  <th class="margen_der_abj">Apellidos</th> 

    
     <th class="margen_der_abj">Nombres</th>
   <th class="margen_der_abj">Ciudad</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres



  $query="SELECT usuario_cedula,usuario_apellidos,usuario_nombres,CASE `usuario`.`usuario_ciudad` WHEN '1' THEN 'Barranquilla' 
WHEN '2' THEN 'Cartegena' WHEN '3' THEN 'Monter&iacute;a' WHEN '4' THEN 'Santa Marta' 
WHEN '5' THEN 'Sincelejo' WHEN '6' THEN 'Valledupar' WHEN '7' THEN 'Rioacha' WHEN '8' 
THEN 'C&uacute;cuta' WHEN '9' THEN 'Bucaramanga' WHEN '10' THEN 'San Andr&eacute;s' END AS ciudad
FROM usuario $condition   ORDER BY ciudad, usuario_nombres ASC 

";

 $result=mysql_query($query,$connection);

 $num_rows=mysql_num_rows($result);

 if($num_rows>0){

	 $i=1;

	 while($row=mysql_fetch_array($result))

	   {

	

  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $i; ?></td>

    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_cedula'] ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_apellidos'] ?></td> 
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_nombres'] ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['ciudad'] ?></td>
    
     

  

  <?php

        $i++;

	   }

	  

	 }



  ?>

</table>
</div> 



<?php
if($_GET['condition']=='')
 {
  $condition="WHERE usuario.usuario_parte < '36'";
 }
 else
  {
    
   $condition=" WHERE usuario_ciudad = '$_GET[condition]' AND usuario.usuario_parte < '36' ";
  }




//total de personas que no han terminado la encuesta
$query1="SELECT count(usuario_cedula) as t
FROM usuario $condition  ORDER BY usuario_apellidos ASC
";
$result1=mysql_query($query1,$connection);
$row1=mysql_fetch_array($result1);
?>
<p style="text-align:center">Personas que no  han terminado la encuesta:  <?php echo $row1['t'];$noter=$row1['t'];  ?></p>
<div id="terminaron3" style=" height: 200px;
    margin: 10px auto;
    overflow: auto;
    width: 631px;">


 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     
    <th class="margen_der_abj">Nro.</th>
    <th class="margen_der_abj">C&eacute;dula</th>

    <th class="margen_der_abj">Apellidos</th> 

    
     <th class="margen_der_abj">Nombres</th>
   <th class="margen_der_abj">Ciudad</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres



  $query="SELECT usuario_cedula,usuario_apellidos,usuario_nombres,CASE `usuario`.`usuario_ciudad` WHEN '1' THEN 'Barranquilla' 
WHEN '2' THEN 'Cartegena' WHEN '3' THEN 'Monter&iacute;a' WHEN '4' THEN 'Santa Marta' 
WHEN '5' THEN 'Sincelejo' WHEN '6' THEN 'Valledupar' WHEN '7' THEN 'Rioacha' WHEN '8' 
THEN 'C&uacute;cuta' WHEN '9' THEN 'Bucaramanga' WHEN '10' THEN 'San Andr&eacute;s' END AS ciudad
FROM usuario $condition   ORDER BY ciudad, usuario_nombres ASC
";

 $result=mysql_query($query,$connection);

 $num_rows=mysql_num_rows($result);

 if($num_rows>0){

	 $i=1;

	 while($row=mysql_fetch_array($result))

	   {

	

  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $i; ?></td>

    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_cedula'] ?></td>
   <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_apellidos'] ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['usuario_nombres'] ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['ciudad'] ?></td>
    
     

  

  <?php

        $i++;

	   }


	  

	 }



  ?>

</table>
</div> 
<p style="padding-left:10px">Porcentaje de personas que han terminado: <?php echo ' %'. number_format(($ter/$pres*100),2,'.',',').' de '.$pres ?> </p>
<p style="padding-left:10px">Porcentaje de personas que no han terminado: <?php echo ' %'. number_format(($noter/$pres*100),2,'.',',').' de '.$pres ?> </p>

