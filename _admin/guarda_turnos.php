<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  
  $array[0] = "'$_POST[nombre]','$_POST[descrip]','$_POST[dtd]','$_POST[inidia]','$_POST[findia]','$_POST[dtn]','$_POST[ininoche]','$_POST[finnoche]','$_POST[dd]','$_POST[dl]','$_POST[tipo_inicio]','$_POST[tp_j]'";

$campos="turno_nombre,turno_descripcion,dtd,r_ini_d,r_fin_d,dtn,r_ini_n,r_fin_n,dias_descanso,dias_laborales,inicio_turno,tp_jornada";
$tabla= "turno";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Turno Ingresao Exitosamente.');
  

  $con-> desconectar();
  
?>