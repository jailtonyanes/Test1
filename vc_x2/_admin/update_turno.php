<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
   // header("Cache-Control: no-cache, must-revalidate"); 

 $consulta="UPDATE turno SET turno_nombre ='$_POST[nombre]',turno_descripcion='$_POST[descrip]'
 ,dtd='$_POST[dtd]',r_ini_d='$_POST[inidia]',
r_fin_d='$_POST[findia]',dtn='$_POST[dtn]',r_ini_n='$_POST[ininoche]',r_fin_n='$_POST[finnoche]',dias_descanso='$_POST[dd]',
dias_laborales='$_POST[dl]',inicio_turno='$_POST[tipo_inicio]',tp_jornada='$_POST[tp_j]'
WHERE turno_id='$_POST[iden2]'";
$mensaje="Turno Actualizado con exito.";

 $crud->update($consulta,$mensaje,$con->getConection());

 $con->desconectar();


?>