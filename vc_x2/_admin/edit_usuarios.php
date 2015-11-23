<?php
   session_start();
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con = new Coneccion($server,$user,$password,$dbname);
  $con->conectar();
  $crud = new Crud();

     
        
  

$crud->update("update usuario set usuario_nombre ='$_POST[nombre]',usuario_apellido='$_POST[apellido]',usuario_nick='$_POST[nick]'
  ,usuario_password='$_POST[password]',usuario_tipo='$_POST[tipo_usuario]',usuario_active='$_POST[estado_usuario]' where usuario_id = '$_POST[iden2]'","Usuario Exitosamente Actualizado.",$con->getConection());
  

  $con-> desconectar();
  
?>
