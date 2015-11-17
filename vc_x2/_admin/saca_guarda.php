<?php
   include('../_include/configuration.php');
  include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2x = new Coneccion($server,$user,$password,$dbname);
  $con2x->conectar();
  $crud2x = new Crud();

     $crud2x-> setConsulta("   SELECT
    CONCAT(`empleado`.`apellido1`,' ', `empleado`.`apellido2`,' ', `empleado`.`nombre1`,' ', `empleado`.`nombre2`)AS guarda,cedula
FROM
    `departamento`
    INNER JOIN `empleado` 
        ON (`departamento`.`departamento_id` = `empleado`.`departamento_id`)
WHERE empleado.departamento_id='$_GET[uid1]'  ORDER BY 
        
        empleado.`apellido1`,empleado.`apellido2`,empleado.`nombre1`,empleado.`nombre2` ");
               $datos2x= $crud2x->seleccionar($con2x->getConection()); 
               
               $i= 0;
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2x)){
                   ?>
                    <option value="<?php echo $datos2x[$i]['cedula'] ?>"><?php echo $datos2x[$i]['guarda'] ?></option>               
                   <?php


                $i++;

               }  
  $con2x-> desconectar();


?>