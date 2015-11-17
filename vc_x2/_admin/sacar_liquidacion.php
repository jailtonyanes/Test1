<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php');
  include("../_classes/intersecto.php");


 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  




   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 

   <!-- Clientes sin marca asignada  -->


    <input type="hidden" name="iden" id="iden" />

    <!--  <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div> -->

 <table  id="table_id" class="cell-border dataTable"  >
<thead>
  <tr>

    <!--  <th >

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /> </th>-->

                <th >CEDULA</th>

    <th >EMPLEADO</th>

    <th >TIPO TURNO</th>

    <th >FECHA</th>


    <th >VALOR</th>
     <th >TIPO_PROG</th>




     <!-- <th >Editar</th>
 -->
  </tr>
  </thead>
    <tfoot>
      <tr>
            <th >CEDULA</th>

    <th >EMPLEADO</th>

    <th >TIPO TURNO</th>

    <th >FECHA</th>


    <th >VALOR</th>

    <th >TIPO_PROG</th>
      </tr>
       <tr>
                <th colspan="4" style="text-align:right">Total:</th>
                <th></th>
                <th></th>
            </tr>
  </tfoot>
<tbody>
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("select  `prog_id`,`guarda_id` , `guarda`, `cliente_id`, `tipo_turno`, `fecha`,`r_ini_d`, `r_fin_d`,  `r_ini_n`,r_fin_n
,`difdia`,vlr_hora,`rec_noct`,`ext_diur`, `ext_noct`
, `ext_fest_diur`,`ext_fest_noct`, `hora_ord_dom_diur`
, `hora_rec_noct_dom`, tipo_programacion  from calcu_nom");

   $datos1 = $crud->seleccionar($con->getConection());
   $tot=0;
   $i=0;
   while ($i<sizeof($datos1))
   {   

       $ini = explode(":", $datos1[$i]['r_ini_n']);
            $fin = explode(";",$datos1[$i]['r_fin_n']);
            $pivote= array('23','0','1','2','3','4','5','6');
             $int =  new intersecto($pivote,$ini[0],$fin[0]);
             $int->contar();
             $int->comparar();

            $a=$int->getVectorInter();
            $fecha=$datos1[$i]['fecha'];
            //______________________
            //para saber si una fecha es festiva
              $crud2 = new Crud(); 
              $crud2->setConsulta("select count(fecha_festiva)as coinc from festivo where fecha_festiva ='$fecha' ");
              $datos2 = $crud2->seleccionar($con->getConection());

            //________________


      //sacar el dia de la semana segun la fecha
              $int->sacar_dia_sem($fecha);
              $dia_semana= $int->getDiaSem();

  ?>

  

  <tr>

   <!--  <td>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['prog_id']  ?>" value="<?php echo $datos1[$i]['prog_id']  ?> " /> 

    </td> -->
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['guarda_id']) ?></td>
    
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['guarda']) ?></td>
   
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['tipo_turno']) ?></td>

    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><span <?php if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1){echo'class="red"';} if($datos1[$i]['tipo_turno']=='X'){echo'class="green"';} ?> ><?php echo htmlentities($datos1[$i]['fecha']).' '.$dia_semana;?> </span></td>

    <td align="right" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php 
      
            //para saber lo de las horas para los recargos

           
            


      if($datos1[$i]['tipo_turno']=='D')
      {
        //dia festivo o domingo diurno
         if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
         {
            echo number_format($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'],0,'.',',');
            $tot=$tot+$datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'];
         }
         else
         {// dia ordinario
           echo number_format($datos1[$i]['vlr_hora']*$datos1[$i]['difdia'],0,'.',','); 
            $tot=$tot+$datos1[$i]['vlr_hora']*$datos1[$i]['difdia'];
         }
          
      }
      else
      {
        if($datos1[$i]['tipo_turno']=='N')
        {
           
           //caso nocturno
           //domingo o festivo nocturno 
           if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
           {
              //noche  festiva sin recargo
             if($a <= 1)
               {
                 echo number_format($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'],0,'.',',');    
                 $tot=$tot+$datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'];
               }
               else
               {
                  echo number_format(($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'])+($a*$datos1[$i]['hora_rec_noct_dom']),0,'.',',');
                  $tot=$tot+($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'])+($a*$datos1[$i]['hora_rec_noct_dom']);
               }


           } 
           else
           {
             //noche  ordinaria sin recargo
             if($a <= 1)
               {
                 
                 echo number_format($datos1[$i]['vlr_hora']*$datos1[$i]['difdia'],0,'.',',');    
                 $tot=$tot+$datos1[$i]['vlr_hora']*$datos1[$i]['difdia'];
               }
               else
               {  //recargo de las noches
                  
                  echo number_format(($datos1[$i]['vlr_hora']*$datos1[$i]['difdia'])+($a*$datos1[$i]['rec_noct']),0,'.',',');
                  $tot=$tot+($datos1[$i]['vlr_hora']*$datos1[$i]['difdia'])+($a*$datos1[$i]['rec_noct']);
               }
           }

           

           

        }
        else
        {
         //descanso
             

          echo '0'; 
        }
      
      }
    ?></td>

    
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['tipo_programacion']) ?></td>

       
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

 
<p><?php 
 echo 'Total del periodo: '. number_format($tot,0,'.',',');
?></p>

 



