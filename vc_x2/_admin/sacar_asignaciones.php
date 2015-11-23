<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  



if($_GET['uid1']!='' && $_GET['uid2']!='' && $_GET['uid3']!='')
{
  $condiciones=" where empleado.cedula = '$_GET[uid1]'  and programacion.fecha >= '$_GET[uid2]' and programacion.fecha
        <= '$_GET[uid3]'";
}       
else
{
  $condiciones ='';
}




   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 

   <!-- Clientes sin marca asignada  -->


    <input type="hidden" name="iden" id="iden" />

    <!--  <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div> -->

 <table  id="table_id" class="cell-border dataTable" >
<thead>
  <tr>

    <!--  <th >

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /> </th>-->

    <th >CLIENTE</th>

    <th >DEP</th>

    <th >MUN</th>

    <th >SUC</th>
<th >PUESTO</th>

    <th >GUARDA</th>
      <th >Prog</th>
    <th >Turno</th>

    <th >NOVEDAD</th>
    <th >Jrn</th>

    <th >FECHA</th>
   
    <th >INIC.</th>


    <th >FIN</th>

    




     <!-- <th >Editar</th>
 -->
  </tr>
  </thead>
    <tfoot>
      <tr>
    
    <th >CLIENTE</th>

    <th >DEP</th>

    <th >MUN</th>

    <th >SUC</th>
   <th >PUESTO</th>

    <th >GUARDA</th>
      <th >Prog</th>
    <th >Turno</th>

    <th >NOVEDAD</th>
    <th >Jrn</th>

    <th >FECHA</th>
   
    <th >INIC.</th>


    <th >FIN</th>
    
      </tr>
  </tfoot>
<tbody>
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT
     puesto.`puesto_nombre`
     ,    
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
    ,programacion.r_ini_n
    ,programacion.r_fin_n
    ,programacion.r_ini_d
    ,programacion.r_fin_d
    ,programacion.tipo_programacion
    ,empleado.cedula
    ,programacion.novedad_horas
   
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
    INNER JOIN puesto ON (programacion.`puesto`=puesto.`puesto_id`)  $condiciones      
         ORDER BY prog_id
");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   

      
  ?>

  

  <tr>

   <!--  <td>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['prog_id']  ?>" value="<?php echo $datos1[$i]['prog_id']  ?> " /> 

    </td> -->
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['cliente_nombre']) ?></td>
    
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['departamento_nombre']) ?></td>
   
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['municipio_nombre']) ?></td>

    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['sucursal_nombre'])?></td>
   <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['puesto_nombre'])?></td>

    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['guarda']?></td>
 <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['tipo_programacion']?></td>
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['turno_nombre'])?></td>

    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a href="update_novedades.php?uid=<?php echo $datos1[$i]['prog_id'] ?>&uid2=<?php echo $datos1[$i]['cedula']?>"  style="cursor:all-scroll; color:#09f; font-weight:bold; " ><?php echo htmlentities($datos1[$i]['nombre']).' * '.$datos1[$i]['novedad_horas'] ?> </a></td>
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['tipo_turno']) ?></td>
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['fecha']) ?></td>
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($datos1[$i]['tipo_turno']=='DIA'){echo htmlentities($datos1[$i]['r_ini_d']);}else{if($datos1[$i]['tipo_turno']=='NOCHE')
                                                                                          {
                                                                                            echo htmlentities($datos1[$i]['r_ini_n']);

                                                                                          }
                                                                                          else
                                                                                            {
                                                                                              echo'N/A';
                                                                                            }
                                                                                      } 
    ?></td>
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php if($datos1[$i]['tipo_turno']=='DIA'){echo htmlentities($datos1[$i]['r_fin_d']);}else{if($datos1[$i]['tipo_turno']=='NOCHE')
                                                                                          {
                                                                                            echo htmlentities($datos1[$i]['r_fin_n']);

                                                                                          }
                                                                                          else
                                                                                            {
                                                                                              echo'N/A';
                                                                                            }
                                                                                      } ?></td>

       
 <!--<td><a onclick="javascript: subir();editar_cliente(<?php echo $datos1[$i]['prog_id'] ?>)" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td> !-->
  
  </tr>

  

  <?php


      $i++;

     }

/*
<?php if($datos1[$i]['tipo_turno']=='D')
                                                                                     {
                                                                                       echo htmlentities($datos1[$i]['r_ini_d']);
                                                                                     }
                                                                                     else
                                                                                      {
                                                                                        if($datos1[$i]['tipo_turno']=='N')
                                                                                          {
                                                                                            echo htmlentities($datos1[$i]['r_ini_n']);

                                                                                          }
                                                                                          else
                                                                                            {
                                                                                              echo'N/A';
                                                                                            }
                                                                                      } 
    ?>
*/

  ?>
</tbody>
</table>

 


 



