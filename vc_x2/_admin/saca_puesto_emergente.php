 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT puesto_id,puesto_nombre FROM puesto WHERE sucursal_id = '$_GET[uid]' ORDER BY puesto_nombre ASC");
               $datos2= $crud2->seleccionar($con2->getConection()); 
               
               $i= 0;
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2)){
                   ?>
                    <option value="<?php echo $datos2[$i]['puesto_id'] ?>"><?php echo $datos2[$i]['puesto_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                   
        

  

  $con2-> desconectar();
  
?>