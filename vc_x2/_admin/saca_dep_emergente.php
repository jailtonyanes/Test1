 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT departamento.`departamento_id`,departamento.`departamento_nombre`
 FROM municipio
JOIN departamento ON(municipio.`departamento_id`=departamento.`departamento_id`)
JOIN sucursal ON (municipio.`municipio_id`=sucursal.`municipio_id`)
JOIN cliente ON (cliente.`cliente_id`=sucursal.`cliente_id`) WHERE cliente.`cliente_id`='$_GET[uid]'
GROUP BY departamento.`departamento_id` ORDER BY departamento.`departamento_nombre` ASC");
               $datos2= $crud2->seleccionar($con2->getConection()); 
               
               $i= 0;
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2)){
                   ?>
                    <option value="<?php echo $datos2[$i]['departamento_id'] ?>"><?php echo $datos2[$i]['departamento_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                   
        

  

  $con2-> desconectar();
  
?>