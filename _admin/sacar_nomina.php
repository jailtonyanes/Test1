<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php');
  include("../_classes/intersecto.php");


 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

//para sacar el subsidio de transporte actual
 $crud_sub = new Crud();
 $crud_sub->setConsulta('select monto as sub_trans from sub_transp where year = (select year(curdate()))');
 $datos_t = $crud_sub->seleccionar($con->getConection());
 $sub_t = round($datos_t[0]['sub_trans']/30);

 $tot_recs_noct=0;


   



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
     
  </tfoot>
<tbody>
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

 if($_GET['gu']=='')
 {
  $guarda='';
 }
 else
 {
  $guarda=" and guarda_id ='$_GET[gu]' ";
 }


   $crud->setConsulta("select  `prog_id`,`guarda_id` , `guarda`, `cliente_id`, `tipo_turno`, `fecha`,`r_ini_d`, `r_fin_d`,  `r_ini_n`,r_fin_n
,`difdia`,vlr_hora,`rec_noct`,`ext_diur`, `ext_noct`
, `ext_fest_diur`,`ext_fest_noct`, `hora_ord_dom_diur`
, `hora_rec_noct_dom`, tipo_programacion  from calcu_nom where fecha>='$_GET[f1]' and fecha<= '$_GET[f2]' $guarda");

   $datos1 = $crud->seleccionar($con->getConection());
   $tot=0;
   $i=0;
   $cont_ext=1;
   $cont_exd2=1;
   $ced=0;
   $cont_turnos=0;
   $horario=0;
   $dia=0;
   while ($i<sizeof($datos1))
   {   
      if($guarda !='' && $datos1[$i]['tipo_turno'] !='X' )
        {
          $cont_turnos=$cont_turnos+1;
          $horario=$datos1[$i]['difdia'];
        }


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
    
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['guarda']) ?></a></td>
   
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo  htmlentities($datos1[$i]['tipo_turno'])?></td>

    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><span <?php if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1){echo'class="red"';} if($datos1[$i]['tipo_turno']=='X'){echo'class="green"';} ?> ><?php 
     
     echo htmlentities($datos1[$i]['fecha']).' '.$dia_semana;?> </span></td>

    <td align="right" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php
      
            //para saber lo de las horas para los recargos
       $dia = date("w",strtotime($datos1[$i]['fecha']));
       if($datos1[$i]['tipo_turno'] != 'X' )
       {//cuando no es descanso
            
           if($dia==0)
            {
             $acum =0;  
            }
            $acum=$acum+$datos1[$i]['difdia'];
            if($acum >48)
            {
              

              //echo $acum.'_extra__';
                  if($datos1[$i]['tipo_turno']=='D')
                  {
                       if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
                         {
                            echo 'edf '.number_format($datos1[$i]['ext_fest_diur']*$datos1[$i]['difdia']+$sub_t,0,'.',',');
                            $tot_ext_f_d=$tot_ext_f_d+$datos1[$i]['ext_fest_diur']*$datos1[$i]['difdia']+$sub_t;
                            $cot_ext_f_d=$cot_ext_f_d+$datos1[$i]['difdia'];

                         }
                         else //calculo con extras en ordinario
                         {// dia ordinario
                           echo 'ed '.number_format($datos1[$i]['ext_diur']*$datos1[$i]['difdia']+$sub_t,0,'.',','); 
                            $tot_ext_d=$tot_ext_d+$datos1[$i]['ext_diur']*$datos1[$i]['difdia']+$sub_t;
                            $cot_ext_d=$cot_ext_d+$datos1[$i]['difdia'];
                         }
                  }
                  else
                  {
                         if($datos1[$i]['tipo_turno']=='N')
                         {
                                      if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
                                         {
                                            //noche  festiva sin recargo
                                               
                                               //se parten las extras en nocturnas y diurnas
                                               $exnf = $datos1[$i]['ext_fest_noct']*$a+$sub_t;
                                               $exdf = $datos1[$i]['ext_fest_diur']*(12-$a)+$sub_t;
                                               echo 'efn '.number_format($exdf+$exnf,0,'.',',');    
                                               $tot_ex_f_n=+($exnf);
                                               $c_exnoctf=+$a; 
                                               $tot_ext_f_d=$exdf;
                                               $cot_ext_f_d=(12-$a); 
                                            //extra dom noct


                                         } 
                                         else
                                         {
                                           
                                             //extra ncoturno
                                              $exn = $datos1[$i]['ext_noct']*$a+$sub_t;
                                              $exd = $datos1[$i]['ext_diur']*(12-$a)+$sub_t;
                                              echo 'en '.number_format($exd+$exn,0,'.',',');    
                                              $tot_ex_n=$tot_ex_n+($exn);
                                              $c_exnoct=$c_exnoct+$a; 
                                              $tot_ext_d =$tot_ext_d+  $exd; 
                                              $cot_ext_d = $cot_ext_d+ (12-$a);


                                         }
                         }  

                  }



            } 
            else
            {
              //horas diurnas tantos en festivas y en ordinarias, en el caso de horas normales
              //echo $acum.'_normal__';
                if($datos1[$i]['tipo_turno']=='D')
                  {
                             if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
                               {
                                  echo 'dom_fest_d '.number_format($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia']+$sub_t,0,'.',',');
                                  $tot_domd=$tot_domd+$datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia']+$sub_t;
                                  $cont_domd=$cont_domd+$datos1[$i]['difdia'];
                               }
                               else
                               {// dia ordinario
                                 echo 'ord_diur '.number_format($datos1[$i]['vlr_hora']*$datos1[$i]['difdia']+$sub_t,0,'.',','); 
                                  $tot_ord=+$datos1[$i]['vlr_hora']*$datos1[$i]['difdia']+$sub_t;
                               }
                    
                  } 
                  else
                  {
                              //horas noctunras tantos en festivas y en ordinarias, en el caso de horas normales
                              //echo $acum.'_normal__';
                              if($datos1[$i]['tipo_turno']=='N')
                              {

                                                  if(date("w", strtotime($datos1[$i]['fecha']))=='0' || $datos2[0]['coinc']== 1)
                                                   {
                                                      //noche  festiva sin recargo
                                                     if($a <= 1)
                                                       {
                                                         echo 'dom_fest_n '.number_format($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia']+$sub_t,0,'.',',');    
                                                         $tot_nochef_sr=+$datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia']+$sub_t;
                                                         $cont_nochef_sr=+$datos1[$i]['difdia'];
                                                       }
                                                       else
                                                       {//noche festiva con recargo
                                                          echo 'fest_noc '.number_format(($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'])+($a*$datos1[$i]['hora_rec_noct_dom'])+$sub_t,0,'.',',');
                                                          $tot_nochef_cr=$tot_nochef_cr+($datos1[$i]['hora_ord_dom_diur']*$datos1[$i]['difdia'])+($a*$datos1[$i]['hora_rec_noct_dom'])+$sub_t;
                                                          $cot_noche_cr=$cot_noche_cr+$a;   
                                                       }


                                                   } 
                                                   else
                                                   {
                                                     //noche  ordinaria sin recargo
                                                     if($a <= 1)
                                                      {
                                                         
                                                         echo 'ord_noc'.number_format($datos1[$i]['vlr_hora']*$datos1[$i]['difdia']+$sub_t,0,'.',',');    
                                                         $tot_nocheor_sr=+$datos1[$i]['vlr_hora']*$datos1[$i]['difdia'] + $sub_t;
                                                       }
                                                       else
                                                       {  //recargo de las noches
                                                          
                                                          echo 'ord_noc'.number_format(($datos1[$i]['vlr_hora'] * $datos1[$i]['difdia'])+($a*$datos1[$i]['rec_noct'])+$sub_t,0,'.',',');
                                                         
                                                          $tot_rec_noct=+($datos1[$i]['vlr_hora'] * $datos1[$i]['difdia'])+($a*$datos1[$i]['rec_noct']) + $sub_t;

                                                       }
                                                   }

                              }    

                  }

            }
            


       }
       else
       {
          if( $datos1[$i]['tipo_turno'] == 'X' && $dia==0 )
            {
                $acum=0;
            }

                 if($datos1[$i]['difdia']>=8)
                  {
                    $mul=8;
                  }
                  else
                  {
                    $mul = $datos1[$i]['difdia']; 
                  }
                  echo number_format($datos1[$i]['vlr_hora']*$mul+$sub_t,0,'.',',');      
                  $tot_desc=$tot_desc+($datos1[$i]['vlr_hora']*$mul+$sub_t); 
       }

    
      
    
           
            


     
    ?></td>

    
    <td <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($datos1[$i]['tipo_programacion']) ?></td>
  </tr>

  

  <?php

          
            if($cont_ext<7)
            {
             
              if($datos1[$i]['tipo_turno']!='X')
              {
                $cont_ext++; 
              }
            }
            else
            {
             $cont_ext=1; 
            }
    
         
      $i++;

     }


  ?>
</tbody>
</table>

 
<p><?php 
   $per =$_GET['ped'];   


   if($per == 10)
   {
     $cant=80;
   }
   else
   {
     if($per == 15)
     {
       $cant=120;
     }
     else
     {
       $cant=240;
     }
   }
   
   if($guarda !='')
   {

      //echo la consulta para la diferencia de horas
      //SELECT ABS((COUNT(tipo_turno)*difdia) - 240) FROM calcu_nom WHERE tipo_turno <>'X' AND guarda_id ='1234' AND MONTH(fecha) = (SELECT MONTH(CURDATE())) 
   }

  
//echo 'Total del periodo: '. number_format($tot,0,'.',',');
 
?></p>


<!-- extras diurnas !-->
<input type="hidden" name="exd" id="exd" value="<?php echo $cot_ext_d;  ?>"></input>
<input type="hidden" name="texd" id="texd" value="<?php echo $tot_ext_d;  ?>"></input>

<!-- extras festivas diurnas !-->
<input type="hidden" name="exdf" id="exdf" value="<?php echo  $cot_ext_f_d;  ?>"></input>
<input type="hidden" name="texdf" id="texdf" value="<?php echo  $tot_ext_f_d; ?>"></input>

<!-- extras festivas noctunras !-->
<input type="hidden" name="exnoctf" id="exnoctf" value="<?php echo $c_exnoctf  ?>"></input>
<input type="hidden" name="texnf" id="texnf" value="<?php echo $tot_ex_f_n ?>"></input>

<!-- extras  noctunras !-->

<input type="hidden" name="exnoct" id="exnoct" value="<?php echo $c_exnoct  ?>"></input>
<input type="hidden" name="texn" id="texn" value="<?php echo $tot_ex_n ?>"></input>

<!-- extras Recargos noctunras !-->
<input type="hidden" name="fest_noche" id="fest_noche" value="<?php echo $cot_noche_cr ?>"></input>
<input type="hidden" name="cont_fest_noche" id="cont_fest_noche" value="<?php echo $tot_nochef_cr ?>"></input>


<!-- extras dominical diurno noctunras !-->

<input type="hidden" name="fest_dia" id="fest_dia" value="<?php echo $tot_domd  ?>"></input>
<input type="hidden" name="cont_fest_dia" id="cont_fest_dia" value="<?php echo $cont_domd ?>"></input>

<p>
  <!-- <a href="informe.php?uid1=<?php echo $datos1[$i]['guarda_id']?>&uid2=<?php echo $_GET['f1'] ?>&uid3=<?php echo $_GET['f2']  ?>&uid4=<?php echo $tot_recs_noct  ?>">calcular para este empleado</a> -->
  <a style="color:#09f; cursor:pointer; text-decoration:underline;" onclick="javascript:calcu_disg()">Calcular para este Empleado</a>
</p>


 



