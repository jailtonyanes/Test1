<?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();
 $crud2= new Crud();
  $fecha=date("Y-m-d");
  

//saber si existe en el sistema
$crud->setConsulta("SELECT COUNT(log_id)AS entradas FROM logeo WHERE fecha= '$fecha' AND cedula ='$_POST[login2]'");
   $datos1 = $crud->seleccionar($con->getConection());

         $i=0;
  while ($i<sizeof($datos1))
     {
         echo $datos1[$i]['entradas'];
        $i++;
     }
//-----------------------------
//saber cuantas veces se ha logueado en el día
  $crud->setConsulta("SELECT COUNT(log_id)AS entradas FROM logeo WHERE fecha= '$fecha' AND cedula ='$_POST[login2]'");
   $datos1 = $crud->seleccionar($con->getConection());

         $i=0;
  while ($i<sizeof($datos1))
     {
         echo $datos1[$i]['entradas'];
        $i++;
     }


  //insertar
  /*$registro=date("Y-m-d:h:i:s");
  $array[0] = "'$_POST[im]','$_POST[solicitante]','$_POST[unidad]','$_POST[hora]','$_POST[nombre_usuario]','$_POST[cel]'
  ,'$_POST[origen]','$_POST[destino]','$_POST[observaciones]','$_POST[movil]','$_POST[conductor_id]','$_POST[vale]','$_POST[fecha]','$pendiente' ,'$_POST[id_elaboro]','$_POST[company]','$_POST[tipo_serv]','$registro'";

$campos="im,solicitante,unidad_negocio,hora,nombre_usuario,celular,dir_origen,dir_destino,observaciones,movil_id,conductor_id,vale_nro,fecha,pendiente,elaboro,company,tipo_servicio,fecha_registro";
$tabla= "servicio";
$crud->insertar($array,$campos,$tabla,$con->getConection(),'Servicio ingresado exitosamente.');*/
  

  $con-> desconectar();
  
?>