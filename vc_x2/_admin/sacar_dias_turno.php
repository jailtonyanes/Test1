<?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

     $crud2-> setConsulta("SELECT dias_laborales+dias_descanso AS dias FROM turno WHERE turno_id='$_GET[uid]'");
               $datos2= $crud2->seleccionar($con2->getConection()); 
               
               $i=1;
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<=$datos2[0]['dias']){
                   ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>               
                   <?php


                $i++;

               }  
  $con2-> desconectar();
?>