 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("
SELECT municipio.`municipio_id`,municipio.`municipio_nombre`
 FROM municipio
JOIN departamento ON(municipio.`departamento_id`=departamento.`departamento_id`)
JOIN sucursal ON (municipio.`municipio_id`=sucursal.`municipio_id`)
JOIN cliente ON (cliente.`cliente_id`=sucursal.`cliente_id`)
JOIN puesto ON(puesto.`sucursal_id`=sucursal.`sucursal_id`) WHERE departamento.`departamento_id`='$_GET[uid1]' AND cliente.`cliente_id`
='$_GET[uid2]'
GROUP BY municipio.`municipio_id` ORDER BY municipio.`municipio_nombre` ASC");
               $datos2= $crud2->seleccionar($con2->getConection()); 
               
               $i= 0;

                
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2)){
                   ?>
                    <option value="<?php echo $datos2[$i]['municipio_id'] ?>"><?php echo $datos2[$i]['municipio_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                   
        

  

  $con2-> desconectar();
  
?>