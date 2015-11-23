<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Turno acutalizado con exito.';

 $crud->update("update turno set turno_nombre='$_POST[nombre]', turno_descripcion ='$_POST[descrip]',
 dias_laborales='$_POST[dl]', dias_descanso ='$_POST[dd]',dtd='$_POST[dtd]', r_ini_d ='$_POST[inidia]',
 r_fin_d='$_POST[findia]', dtn ='$_POST[dtn]',r_ini_n='$_POST[ininoche]', r_fin_n ='$_POST[finnoche]',
 tp_jornada='$_POST[tp_j]', inicio_turno ='$_POST[tipo_inicio]' where turno_id ='$_POST[iden2]' 
 	",$mensaje,$con->getConection());


$con->desconectar();
?>

