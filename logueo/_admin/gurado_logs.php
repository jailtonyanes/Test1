<?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   include('../_classes/logueo.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
 
  $crud2= new Crud();
  $fecha=date("Y-m-d");
  $time=date("H:i:s");
  $day=date("w");


//se mira si la persona existe en la base de datos
  $crud2->setConsulta("SELECT cedula AS existe, tipo_usuario  FROM empleado e WHERE e.`cedula`='$_POST[usuario]'");
  $datos2 = $crud2->seleccionar($con->getConection());


  if($datos2[0]['existe']>0)
  {
    //se miran cuantos logueos lleva la persona en el día
   $crud3 = new Crud();
     if($datos2[0]['tipo_usuario']=='1'||$datos2[0]['tipo_usuario']=='2')
     {
            $crud3->setConsulta(" SELECT log_id, tipo_log FROM logeo WHERE log_id=(SELECT MAX(log_id) FROM logeo WHERE cedula ='$_POST[usuario]')");
            $datos1 = $crud3->seleccionar($con->getConection());
     }
     else
     {
         $crud3->setConsulta("SELECT COUNT(log_id)AS entradas FROM logeo WHERE fecha= '$fecha' AND cedula ='$_POST[usuario]'");
         $datos1 = $crud3->seleccionar($con->getConection());
      }

               
       //ingresar según las veces que se haya logueado
        $log = new logueo($fecha,$datos2[0]['tipo_usuario'],$time,$datos1[0]['entradas'],$_POST['usuario'],$datos1[0]['tipo_log'],$day);      
        $log->registrar_ingreso();
        $sw=$log->getSw();
        
       if($sw!=1){ 
            
            $array1[0]=$log->getArray();
            $mensaje=$log->getMensaje();
            $campos="fecha,cedula,tipo_log,hora";
            $tabla= "logeo";
            $crud3->insertar($array1,$campos,$tabla,$con->getConection(),$mensaje);
       }
       else
       {
          echo 'Fin de su jornada por el día de hoy.';
       }
  }
  else
  {
    echo 'Empleado no existe';
  }
  $con-> desconectar();
?>