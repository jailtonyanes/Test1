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

 <h2>Lista de Clientes</h2>



    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>





    <th class="margen_der_abj">Nombre del Cliente</th>


  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT
     cliente.cliente_nombre,cliente.`cliente_id`
   
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
        ON (`novedad`.`novedad_id` = `programacion`.`novedad_id`)
    INNER JOIN puesto ON (programacion.`puesto`=puesto.`puesto_id`)
    GROUP BY cliente.`cliente_id`      
         ORDER BY cliente.cliente_nombre ASC");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a style="cursor:pointer;color:#054B81;text-decoration:underline" onclick="javascript:sacar_lc('<?php echo $datos1[$i]['cliente_id'] ?>')"><?php echo $datos1[$i]['cliente_nombre'] ?></a></td>
    
    
  </tr>

  

  <?php


    $i++;

   }



  ?>

</table>

 





