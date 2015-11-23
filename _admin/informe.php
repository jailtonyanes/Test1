<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php');
 include("../_classes/intersecto.php");
 
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

 $crud->setConsulta("select vlr_hora from calcu_nom where fecha >='$_GET[uid]' and fecha <= '$_GET[uid2]' and guarda_id ='$_GET[uid3]' group by vlr_hora");
$datos= $crud->seleccionar($con->getConection());


?>
<tr>
    <th colspan="3" class="margen_der_abj">DEVENGOS </th></tr>
  <tr>

     
     <th align="center" class="margen_der_abj">
      CONCEPTO
     </th>
     <th align="center" class="margen_der_abj">
      CANTIDAD
     </th>
     <th align="center" class="margen_der_abj">
      VALOR
     </th>
     
  </tr>
   <tr>

     
     <td align="center" class="margen_der_abj">
      BÁSICO
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid4']*8 ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $datos[0]['vlr_hora'] *  ($_GET['uid4']*8); ?>
     </td>

  </tr>
  <tr>
             <td align="center" class="margen_der_abj">
      HEN
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid11'] ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid12'] ?>
     </td>
 


  </tr>
    <tr>
             <td align="center" class="margen_der_abj">
      HENF
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid9'] ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid10'] ?>
     </td>
 


  </tr>
  <tr>
        <td align="center" class="margen_der_abj">
      HED
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid5']; ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid6']; ?>
     </td>
  </tr>
  <tr>
        <td align="center" class="margen_der_abj">
      HEDF
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid7']; ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid8']; ?>
     </td>
  </tr>
   <tr>
        <td align="center" class="margen_der_abj">
      DOMINICAL DIURNO
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid16']; ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid15']; ?>
     </td>
  </tr>
  <tr>
        <td align="center" class="margen_der_abj">
      DOMINICAL NOCTURNO
     </td>
             <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid13']; ?>
     </td>
     <td align="center" class="margen_der_abj">
      <?php echo $_GET['uid14']; ?>
     </td>
  </tr>


