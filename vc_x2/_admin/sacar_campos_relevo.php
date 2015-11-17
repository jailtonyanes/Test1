<legend>Asignar Turno/sucursal &nbsp;&nbsp;<a style="cursor:pointer" title="Desplegar" onclick="javascript:abrir('per')" >&nbsp;&nbsp;+</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a style="cursor:pointer" title="Plegar" onclick="javascript:cerrar('per')">-&nbsp;&nbsp;</a></legend>
<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

$crud->setConsulta("select inicio_turno,dtd,dtn,dias_descanso from turno where turno_id ='$_GET[uid]'");
$datos_tr =$crud->seleccionar($con->getConection());

   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 
<div id="per">
   <!-- Clientes sin marca asignada  -->


<?php
  if($datos_tr[0]['inicio_turno']=='1')
  {
    $inicio1= $datos_tr[0]['dtd'];
    $descanso= $datos_tr[0]['dias_descanso'];
    $inicio2 = $datos_tr[0]['dtn'];
    $cliente = "select_cliente_d-";
    $jornada = '(DIA)';
    $sucursal= "select_suc_d";
    $sucursal2= "select_suc_n"; 
    $cliente2 = "select_cliente_n-";
    $jornada2 = '(NOCHE)';
    
    //---------------
  }
  else
  {
        $inicio1= $datos_tr[0]['dtn'];
    $descanso= $datos_tr[0]['dias_descanso'];
    $inicio2 = $datos_tr[0]['dtd'];
    $cliente = "select_cliente_n-";
    $jornada = '(NOCHE)';

     
    $cliente2 = "select_cliente_d-";
    $jornada2 = '(DIA)';
    $sucursal= "select_suc_n";
    $sucursal2= "select_suc_d";
  } 
?>

<?php
     $i1= 1;
      while($i1<= $inicio1)
      {
          
       ?> 
        <!--$inicio1 los p de los turnos de dia !-->
          <p>
    <label>
       Cliente <?php echo ' '.$i1.' '.$jornada ?>:
       <select name="<?php echo $cliente.$i1 ?>" type="text" id="<?php echo $cliente.$i1 ?>"  class="ancho" onchange="javascript:sacar_su(this.id)"  >
              <option value="" selected="selected">Escoja opci&oacute;n</option>               
              <?php
               $crud_cliente = new Crud();
               $crud_cliente-> setConsulta("SELECT cliente_id,cliente_nombre FROM cliente where cliente.cliente_activo = '1' ORDER BY cliente_nombre ASC");
               $datos_cliente= $crud_cliente->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos_cliente)){
                   ?>
                    <option value="<?php echo $datos_cliente[$i]['cliente_id'] ?>"><?php echo $datos_cliente[$i]['cliente_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                //$con->desconectar();


               ?>             
       </select>
    </label>
    </p>


     <p>

    <label>
      Seleccione Sucursal:
       <select name="<?php echo $sucursal.$i1 ?>" type="text" id="<?php echo $sucursal.$i1 ?>" class="ancho" >
                          
                          
       </select>
    </label>
    </p>
 

       <?php
        $i1++;
      }
?>


<?php
     $i1= 1;
      while($i1<= $inicio2)
      {
          
       ?> 
        <!--$inicio1 los p de los turnos de dia !-->
          <p>
    <label>
       Cliente <?php echo ' '.$i1.' '.$jornada2  ?>:
       <select name="<?php echo $cliente2.$i1 ?>" type="text" id="<?php echo $cliente2.$i1 ?>"  class="ancho" onchange="javascript:sacar_su(this.id)"  >
              <option value="" selected="selected">Escoja opci&oacute;n</option>               
              <?php
               $crud_cliente = new Crud();
               $crud_cliente-> setConsulta("SELECT cliente_id,cliente_nombre FROM cliente ORDER BY cliente_nombre ASC");
               $datos_cliente= $crud_cliente->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos_cliente)){
                   ?>
                    <option value="<?php echo $datos_cliente[$i]['cliente_id'] ?>"><?php echo $datos_cliente[$i]['cliente_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                //$con->desconectar();


               ?>             
       </select>
    </label>
    </p>
     <p>

    <label>
      Seleccione Sucursal:
       <select name="<?php echo $sucursal2.$i1 ?>" type="text" id="<?php echo $sucursal2.$i1 ?>" class="ancho" >
                          
                          
       </select>
    </label>
    </p>
 
 <p>
       <?php
        $i1++;
      }
?>
<?php
  $i3=1;
  while($i3<=$descanso)
  {
    ?>
        <p>
  <label> Descanso <?php echo $i3 ?>:
      <input name="descanso<?php echo $i3 ?>" id="descanso<?php echo $i3 ?>" type="text" class="ancho" readonly="readonly">
      </input>
   
    </label>
  
  </p>

    <?php

    $i3++;
  }
?>
 </div> 