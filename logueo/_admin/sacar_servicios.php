<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
   <!-- Clientes sin marca asignada  -->
 <h2>Lista De Servicios Prestados</h2>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
     <th class="margen_der_abj">Fecha</th>
    <th class="margen_der_abj">Conductor</th>
    <th class="margen_der_abj">Placa</th>
    <th class="margen_der_abj">Cupo</th>
    <th class="margen_der_abj">Direccion</th>
     <th class="margen_der_abj">Precio</th>

     
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
  $query="SELECT
    conductor.conductor_nombre
    , conductor.conductor_apellido
    , servicio.direccion
    , servicio.precio
    , servicio.fecha
    , conductor.conductor_placa
	,servicio.cupo
FROM
    tivoli.servicio
    INNER JOIN tivoli.conductor 
        ON (servicio.conductor_id = conductor.conductor_id) ORDER BY fecha DESC;
";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
  ?>
  <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['fecha']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_nombre'].' '.$row['conductor_apellido']; ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_placa']; ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['cupo']; ?></td>
       <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['direccion']; ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo '$'.number_format($row['precio'],0,',','.'); ?></td>


  </tr>
  <?php
        $i++;
	   }
	 }
  ?>
</table>
