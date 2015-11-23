<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  



?>

 <!-- Clientes sin marca asignada  -->

 <h2>Información detallada en los puestos, día por día</h2>



    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>





    <th class="margen_der_abj" style="font-size:12px">Cédula</th>
    <th class="margen_der_abj" style="font-size:12px">Apellidos y Nombres</th>
    <th class="margen_der_abj" style="font-size:12px">Detalle</th>


  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT guarda_id,empleado.nombre1,empleado.`nombre2`,empleado.`apellido1`,empleado.`apellido2`,GROUP_CONCAT(DAY(fecha),' = ',tipo_turno,' ' ORDER BY  fecha ASC)AS reparto 
FROM programacion JOIN empleado ON(empleado.`cedula`= programacion.`guarda_id`) WHERE programacion.`cliente_id`='$_GET[cliente]'
AND  programacion.`departamento_id`='$_GET[depar]'
AND programacion.`municipio_id`='$_GET[muni]'
AND programacion.`sucursal_id`='$_GET[sucur]'
AND programacion.puesto='$_GET[puest]'
AND programacion.`fecha`>='$_GET[desde]' AND fecha <='$_GET[hasta]'
GROUP BY guarda_id ORDER BY  guarda_id ASC");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a style="cursor:pointer;color:#054B81; font-size:12px" ><?php echo $datos1[$i]['guarda_id'] ?></a></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a style="cursor:pointer;color:#054B81; font-size:12px" ><?php echo $datos1[$i]['nombre1'].' '.$datos1[$i]['nombre2'].' '.$datos1[$i]['apellido1'].' '.$datos1[$i]['apellido2']?></a></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a style="cursor:pointer;color:#054B81; font-size:12px" ><?php echo $datos1[$i]['reparto'] ?></a></td>
    
    
  </tr>

  

  <?php


    $i++;

   }



  ?>

</table>

 





