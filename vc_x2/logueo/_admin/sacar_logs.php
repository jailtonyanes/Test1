<?php
   include('../_include/configuration.php');
  include('../_classes/conectar.php');
  include('../_classes/crud.php');

   $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();
 

?>
   <!-- Clientes sin marca asignada  -->
 <h2>Reporte de Control de Asistencia</h2>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th class="margen_der_abj">CEDULA</th>
    <th class="margen_der_abj">APELLIDOS</th>
    <th class="margen_der_abj">NOMBRES</th>
    <th class="margen_der_abj">FECHA</th>
    <th class="margen_der_abj">HORA</th>
     <th class="margen_der_abj">TIPO DE INGRESO</th>
     <th class="margen_der_abj">SEDE</th>
     <th class="margen_der_abj">DEPARTAMENTO</th>
      

     
  </tr>
  <?php
  $crud->setConsulta("SELECT empleado.`cedula`, `empleado`.`apellido1` , 
`empleado`.`apellido2` , `empleado`.`nombre1` , 
`empleado`.`nombre2` , `logeo`.`fecha` , `logeo`.`hora` ,
 `logeo`.`tipo_log` , `sucursal`.`sucursal_nombre` ,
tipo_usuario.`nombre_tipo` FROM `login_users`.`logeo`
 INNER JOIN `login_users`.`empleado`
  ON (`logeo`.`cedula` = `empleado`.`cedula`) 
  INNER JOIN `login_users`.`sucursal` ON
   (`empleado`.`sucursal_id` = `sucursal`.`succursal_id`)
    INNER JOIN tipo_usuario ON
    (empleado.`tipo_usuario`=tipo_usuario.`tipo_id`) 
    ORDER BY fecha DESC,hora ASC,apellido1 ASC,apellido2
     ASC,nombre1 ASC,nombre2, apellido1 ASC,apellido2
      ASC,nombre1 ASC,nombre2 ASC,fecha DESC, hora DESC"); 
       $datos1 = $crud->seleccionar($con->getConection());

         $i=0;
  while ($i<sizeof($datos1))
     {
  ?>
  <tr>
     
     
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['cedula']; ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo strtoupper($datos1[$i]['apellido1'].' '.$datos1[$i]['apellido2']) ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo strtoupper($datos1[$i]['nombre1'].' '.$datos1[$i]['nombre2']) ?></td>
       <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['fecha']; ?></td>
   
 <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['hora']; ?></td>
<td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['tipo_log']; ?></td>
<td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_nombre']; ?></td>
<td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['nombre_tipo']; ?></td>


  </tr>
  <?php
       $i++;
     }
   $con->desconectar();
   ?>
</table>
 <script type="text/javascript">
$('.goTop').click(
      function()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }
);
</script>