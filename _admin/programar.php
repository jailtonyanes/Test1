<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   include('../_classes/pivote.php');
   include('../_classes/generar_pro.php');
?>

<?php
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT turno_id,turno_nombre,turno_descripcion,dias_laborales,dias_descanso,dtd,dtn,inicio_turno,r_ini_d,r_fin_d,r_ini_n,r_fin_n
      FROM turno WHERE turno_id='$_POST[select_turno]'");
     $datos2= $crud2->seleccionar($con2->getConection()); 

     $ini_n=$datos2[0]['r_ini_n'];
     $fin_n=$datos2[0]['r_fin_n'];
     $ini_d=$datos2[0]['r_ini_d'];
     $fin_d=$datos2[0]['r_fin_d'];         
      
     $pivot = new Pivote($datos2[0]['dtd'],$datos2[0]['dtn'],$datos2[0]['dias_descanso'],$datos2[0]['inicio_turno']); 
     $pivot->llena_pivote();
     $pivot->getPivote();
     $largo=$pivot->getLongitud();
     $inicio=$pivot->getPivote();

     $k= $_POST['select_dia_ini_turno']-1;
     $asig=$inicio[$k];
     

     $gen_pro = new Program($_POST['desde'],$_POST['hasta']);

     $gen_pro->calcular_rango();
    $tope= $gen_pro->getInterval();



     $i=0;
     while( $i<= $tope)
     {
          
         

          $dia=$gen_pro-> sumar_dias($_POST['desde'],$i); 
          $crud3= new Crud();
          $array[0] = "'$_POST[select_cliente]','$_POST[select_dpto]','$_POST[select_municipio]','$_POST[select_sucursal]','$_POST[select_guarda]','$_POST[select_turno]','8','$asig','$dia','0','$ini_d','$fin_d','$ini_n','$fin_n','FIJO','0','$_POST[select_puesto]'";
          $campos="cliente_id,departamento_id,municipio_id,sucursal_id,guarda_id,turno_id,novedad_id,tipo_turno,fecha,remplazo_guarda_id,r_ini_d,r_fin_d,r_ini_n,r_fin_n,tipo_programacion,novedad_horas,puesto";
          $tabla= "programacion";
          $crud3->insertar($array,$campos,$tabla,$con2->getConection(),'1');
          $k++;
          if($k>$largo-1)
             {
               $k=0;
             }
          $asig=$inicio[$k];
         
      $i++;
     }
     


  $con2-> desconectar();             
?>
             
 
