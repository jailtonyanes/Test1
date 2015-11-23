 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("
SELECT
     municipio.`municipio_id`,municipio.`municipio_nombre`
   
FROM
    `cliente`
    INNER JOIN `programacion` 
        ON (`cliente`.`cliente_id` = `programacion`.`cliente_id`)
    INNER JOIN `departamento` 
        ON (`departamento`.`departamento_id` = `programacion`.`departamento_id`)
    INNER JOIN `municipio` 
        ON (`municipio`.`municipio_id` = `programacion`.`municipio_id`)
    INNER JOIN `sucursal` 
        ON (`sucursal`.`sucursal_id` = `programacion`.`sucursal_id`)
    INNER JOIN `empleado` 
        ON (`empleado`.`cedula` = `programacion`.`guarda_id`)
    INNER JOIN `turno` 
        ON (`turno`.`turno_id` = `programacion`.`turno_id`)
    INNER JOIN `novedad` 
        ON (`novedad`.`novedad_id` = `programacion`.`novedad_id`)
    INNER JOIN puesto ON (programacion.`puesto`=puesto.`puesto_id`) where departamento.departamento_id = '$_GET[uid2]'
    GROUP BY municipio.`municipio_id`      
         ORDER BY municipio.`municipio_nombre` ASC ");
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