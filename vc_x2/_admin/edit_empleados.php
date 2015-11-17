<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

$mensaje ='Empleado actualizado con exito.';

 $crud->update("update empleado set apellido1='$_POST[apellido_uno]', apellido2 ='$_POST[apellido_dos]',
 nombre1 = '$_POST[nombre_uno]',nombre2='$_POST[nombre_dos]',cedula= '$_POST[cedula]',departamento_id ='$_POST[departamento_id]',
 municipio_id = '$_POST[select_municipio]',direccion = '$_POST[direccion]', barrio= '$_POST[barrio]',
 telefono_fijo = '$_POST[telefono_fijo]',celular ='$_POST[celular]',email= '$_POST[email]',cargo ='$_POST[cargo]'
 ,tipo_sangre='$_POST[tipo_sangre]' where cedula ='$_POST[iden2]' ",$mensaje,$con->getConection());

?>

