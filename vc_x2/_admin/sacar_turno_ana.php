<?php



 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  




   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 

   <!-- Clientes sin marca asignada  -->

 <h2>Lista de Turnos en el Sistema</h2>

    <input type="hidden" name="iden" id="iden" />



     <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_turnos()"  />

    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     <th align="center" class="margen_der_abj">

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>

    <th class="margen_der_abj">Nombre</th>

    <th class="margen_der_abj">Descripci&oacute;n</th>


    <th class="margen_der_abj">D&iacute;as Laborales</th>

    <th class="margen_der_abj">D&iacute;as de Descanso</th>




  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT turno_id,turno_nombre,turno_descripcion, dias_laborales, dias_descanso FROM turno ORDER BY turno_nombre ASC");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['usuario_id']  ?>" value="<?php echo $datos1[$i]['turno_id']  ?> " /> 

    </td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>> <a class="apuntar" onclick="javascript:analizar(<?php echo $datos1[$i]['turno_id'] ?>)"><?php echo utf8_decode($datos1[$i]['turno_nombre']) ?> </a></td>
    
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo utf8_decode($datos1[$i]['turno_descripcion']) ?></td>
   

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['dias_laborales'] ?></td>
     <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['dias_descanso'] ?></td>
    
   </tr>

  

  <?php


	  $i++;

	 }



  ?>

</table>

 
 <p style="padding-left:600px;">
 <a href="#" class="goTop"><img src="../_images/anchor_up.png" title="Ir al inicio" /></a>
 </p>
<script type="text/javascript">
$('.goTop').click(
      function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }
);
</script>
 

 



