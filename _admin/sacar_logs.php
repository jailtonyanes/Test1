<?php
   include('../_include/configuration.php');
  include('../_classes/conectar.php');
  include('../_classes/crud.php');

   $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();
 

?>
   <!-- Clientes sin marca asignada  -->
 <h2>Lista De Servicios Prestados</h2>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
     <th align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>
    <th class="margen_der_abj">Fecha de Registro</th>
    <th class="margen_der_abj">Fecha del Servicio</th>
    <th class="margen_der_abj">Hora del Servicio</th>
    <th class="margen_der_abj">IM</th>
     <th class="margen_der_abj">Estado</th>
     <th class="margen_der_abj">Usuario</th>
     <th class="margen_der_abj">Elaborado Por</th>

     
  </tr>
  <?php
  $crud->setConsulta("SELECT servicio_id,im,nombre_usuario,hora,elaboro,CASE pendiente 
    WHEN 0 THEN 'COMPLETA' WHEN 1 THEN 'PENDIENTE' END AS estado,fecha,fecha_registro,
    CONCAT(`usuario_nombre`,' ',`usuario_apellido`) AS elaboro
FROM servicio INNER JOIN usuario_sis ON (servicio.`elaboro`=usuario_sis.`usuario_id`)
 ORDER BY fecha_registro DESC,solicitante ASC"); 
       $datos1 = $crud->seleccionar($con->getConection());

         $i=0;
  while ($i<sizeof($datos1))
     {
  ?>
  <tr>
     
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['servicio_id']  ?>" value="<?php echo $datos1[$i]['servicio_id']  ?> " /> 
     </td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['fecha_registro']; ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['fecha']; ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['hora'] ?></td>
       <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['im']; ?></td>
    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a 
      <?php if($datos1[$i]['estado']=='PENDIENTE')
	  {
		  echo 'style="color:#900;cursor:pointer"';
	  }
	  else
	  {
		  echo 'style="color:#093;cursor:pointer"';
	  } ?> onclick="javascript:editar_serv(<?php echo $datos1[$i]['servicio_id'] ?>)" class="goTop" ><?php echo $datos1[$i]['estado']; ?></a></td>
 <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['nombre_usuario']; ?></td>
<td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['elaboro']; ?></td>


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