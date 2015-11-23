<?php
   date_default_timezone_set("America/Bogota");
  header("Content-Type: application/vnd.ms-excel");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("content-disposition: attachment;filename='NOMBRE.xlsx'");
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate");

$query="SELECT
    conductor.conductor_nombre
    , conductor.conductor_apellido
    , servicio.direccion
    , servicio.precio
    , servicio.fecha
    ,servicio.cupo
    , conductor.conductor_placa
FROM
    tivoli.servicio
    INNER JOIN tivoli.conductor 
        ON (servicio.conductor_id = conductor.conductor_id) WHERE servicio.servicio_id=(SELECT MAX(servicio_id) FROM servicio)";
		
		$result=mysql_query($query,$connection);
		$row=mysql_fetch_array($result);
	
?>

  <table border="0" cellpadding="0" cellspacing="0">
   <tr>
    <td align="center">
<strong>Estaci&oacute;n de taxi tivoli</strong>
    </td>
    </tr>
    <tr>
     <td align="center">
NIT. 802005407-6
    </td>
    </tr>
    <tr>
     <td align="center">
 Fecha y Hora: <br/> <?php 
 
 echo $row['fecha']; ?>
    </td>
   
    </tr>
  <tr>
  <td align="center">
   Conductor:  <?php  echo $row['conductor_nombre'].' '.$row['conductor_apellido']; ?>
  </td>
  </tr>
   <tr>
  <td align="center">
   Placa:  <?php  echo $row['conductor_placa'];?>
  </td>
  </tr>
  <tr>
  <td align="center">
  <strong>Destino: <br/><?php echo $row['direccion'];  ?>
  </strong>
  </td>
  </tr>
 
  <tr>
  <td align="center">
   <p style="font-size:16px;"> <strong><strong> Precio:   <?php  echo $row['precio']; ?></strong></p>
  </td>
  </tr>
  <tr>
  <td align="center">
   Cupo: <?php  echo $row['cupo']; ?>
  </td>
  </tr>
  
  <tr>
   <td align="center">
     Quejas y reclamos tels: 
     <br/>
     3572111-3571105
   </td>
  </tr>
  <br/>
  <tr>
   <td align="center">
   De su buena elecci&oacute;n<br />depende nuestro<br />buen servicio
   </td>
  </tr>
  </table>


  <?php 
    mysql_close($connection);
  ?>

 

