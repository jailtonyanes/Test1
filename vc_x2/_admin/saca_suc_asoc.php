<?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT     `sucursal`.`sucursal_id`     , `sucursal`.`sucursal_nombre` FROM     `cliente` 
    INNER JOIN `sucursal`          ON (`cliente`.`cliente_id` = `sucursal`.`cliente_id`) 
        INNER JOIN `municipio`          ON (`sucursal`.`municipio_id` = `municipio`.`municipio_id`)
             INNER JOIN `departamento`          ON (`municipio`.`departamento_id` = `departamento`.`departamento_id`) WHERE cliente.cliente_id='$_GET[uid1]' 
                   AND departamento.departamento_id='$_GET[uid2]' AND municipio.municipio_id='$_GET[uid3]' ORDER BY sucursal_nombre ASC ");
               $datos2= $crud2->seleccionar($con2->getConection()); 
               
               $i= 0;
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2)){
                   ?>
                    <option value="<?php echo $datos2[$i]['sucursal_id'] ?>"><?php echo $datos2[$i]['sucursal_nombre'] ?></option>               
                   <?php


                $i++;

               }  
  $con2-> desconectar();
?>