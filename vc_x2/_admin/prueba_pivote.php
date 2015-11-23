<?php
  // session_start();
   //include('../_include/configuration.php');
  /* include('../_classes/pivote.php');
   //include('../_classes/crud.php');
   //$t_dia1,$t_noche1,$t_descanso1,$inicio_turno1
    $pv = new Pivote(3,0,1,1);
    $pv->llena_pivote();
    echo $pv->getPivote();  
    */
/*  include('../_classes/generar_pro.php');
 
  //($cliente1,$departamento1,$municipio1,$sucursal1,$guarda1,$turno1,$novedad1,$fecha_ini1,$fecha_fin1) 
  $prog = new Program(1,2,3,4,5,6,7,'2014-05-20','2014-05-27');
  $prog->calcular_rango();
  echo $prog->getInterval(); 
*/



/*$date = new DateTime('2000-01-01');
$date->add(new DateInterval('P10D'));
echo $date->format('Y-m-d') . "\n";*/
/*include('../_classes/generar_pro.php');
  $prog = new Program(1,2,3,4,5,6,7,'2014-05-20','2014-05-27');
echo $prog->sumar_dias('2014-05-20',3);
*/



$datetime1 = date_create('2009-10-11');
$datetime2 = date_create('2009-10-13');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a días');




     
?>