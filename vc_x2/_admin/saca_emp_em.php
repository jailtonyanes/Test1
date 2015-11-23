 <?php
   include('../_include/configuration.php');
   include('../_classes/conectar.php');
   include('../_classes/crud.php');
   
  $con2 = new Coneccion($server,$user,$password,$dbname);
  $con2->conectar();
  $crud2 = new Crud();

?>
 <option value="" selected="selected">Escoja opción</option>
<?php
   $crud2->setConsulta("select  `guarda_id` , `guarda`  from calcu_nom where fecha >='$_GET[uid]' and fecha <= '$_GET[uid2]'
group by guarda

 order by guarda asc");
    $i=0;
   $datos_2 = $crud2->seleccionar($con2->getConection());
     while ($i<sizeof($datos_2))
     { 
 ?>  

  <option value="<?php echo $datos_2[$i]['guarda_id']  ?>"><?php echo $datos_2[$i]['guarda']  ?></option>
  <?php
   
      $i++;
     }


                   
        

  

  $con2-> desconectar();
  
?>