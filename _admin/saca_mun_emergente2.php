 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT municipio_id, municipio_nombre FROM municipio WHERE municipio.`departamento_id`='$_GET[uid]' ORDER BY municipio_nombre ASC ");
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