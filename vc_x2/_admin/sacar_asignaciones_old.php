<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  




   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 

   <!-- Clientes sin marca asignada  -->

 <h2>Lista de Asignaciones Creadas en el sistema</h2>

    <input type="hidden" name="iden" id="iden" />

     <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     <th align="center" class="margen_der_abj">

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>

    <th class="margen_der_abj">CLIENTE</th>

    <th class="margen_der_abj">DEPARTAMENTO</th>

    <th class="margen_der_abj">MUNICIPIO</th>

    <th class="margen_der_abj">SUCURSAL</th>


    <th class="margen_der_abj">GUARDA</th>

    <th class="margen_der_abj">N.TURNO</th>

    <th class="margen_der_abj">NOVEDAD</th>
    <th class="margen_der_abj">T.TURNO</th>

    <th class="margen_der_abj">FECHA</th>




     <!-- <th class="margen_der_abj">Editar</th>
 -->
  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT
    `programacion`.`prog_id`
    , `cliente`.`cliente_nombre`
    , `departamento`.`departamento_nombre`
    , `municipio`.`municipio_nombre`
    , `sucursal`.`sucursal_nombre`
    , 
    CONCAT(`empleado`.`apellido1`,' ', `empleado`.`apellido2`,' ', `empleado`.`nombre1`,' ', `empleado`.`nombre2`) AS guarda
    , `turno`.`turno_nombre`
    , `novedad`.`nombre`
    ,CASE tipo_turno WHEN 'N' THEN 'NOCHE' WHEN 'X' THEN 'DESCANSO' WHEN 'D' THEN 'DIA' END AS tipo_turno,DATE(fecha) AS fecha
FROM
    `cliente`
    INNER JOIN `programacion` 
        ON (`cliente`.`cliente_id` = `programacion`.`cliente_id`)
    INNER JOIN `departamento` 
        ON (`departamento`.`departamento_id` = `programacion`.`departamento_id`)
    INNER JOIN `municipio` 
        ON (`municipio`.`municipio_id` = `programacion`.`municipio_id`)
    INNER JOIN `sucursal` 
        ON (`sucursal`.`sucursal_id` = `programacion`.`sucursal_id`)
    INNER JOIN `empleado` 
        ON (`empleado`.`cedula` = `programacion`.`guarda_id`)
    INNER JOIN `turno` 
        ON (`turno`.`turno_id` = `programacion`.`turno_id`)
    INNER JOIN `novedad` 
        ON (`novedad`.`novedad_id` = `programacion`.`novedad_id`) order by prog_id");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['prog_id']  ?>" value="<?php echo $datos1[$i]['prog_id']  ?> " /> 

    </td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['cliente_nombre']) ?></td>
    
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['departamento_nombre']) ?></td>
   
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['municipio_nombre']) ?></td>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['sucursal_nombre'])?></td>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['guarda']?></td>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['turno_nombre'])?></td>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['nombre']) ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['tipo_turno']) ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['fecha']) ?></td>

       
 <!--<td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: subir();editar_cliente(<?php echo $datos1[$i]['prog_id'] ?>)" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td> !-->
  
  </tr>

  

  <?php


	  $i++;

	 }



  ?>

</table>

 
 <p style="padding-left:600px;">
 <a href="#" class="goTop"><img src="../_images/anchor_up.png" title="Ir al inicio" /></a>
 </p>
<script type="text/javascript">
$('.goTop').click(
      function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }
);
</script>
 

 



