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

 <h2>Listado de Novedades</h2>

    <input type="hidden" name="iden" id="iden" />

     <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     <th align="center" class="margen_der_abj">

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>

    <th class="margen_der_abj">Nombre</th>    
    <th class="margen_der_abj">Codigo</th>
    <th class="margen_der_abj">Tipo</th>
    <th class="margen_der_abj">Requiere Reemplazo</th>
 




     <th class="margen_der_abj">Editar</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT novedad_id,codigo,CASE tipo WHEN '1' THEN 'DEDUCCION' WHEN '2' THEN 'RECARGO' WHEN '3' THEN 'DEDUCCION' END AS tipo,CASE reemplazo WHEN '1' THEN 'SI' WHEN '2' THEN 'NO' END AS reemplazo,
nombre FROM novedad ORDER BY nombre ASC");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['novedad_id']  ?>" value="<?php echo $datos1[$i]['novedad_id']  ?> " /> 

    </td>

    
    <td align="justify" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['nombre'] ?></td>
    <td align="justify" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['codigo'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['tipo'] ?></td>
        <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['reemplazo'] ?></td>
    
    
 <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: subir();editar_cliente(<?php echo $datos1[$i]['novedad_id'] ?>)" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>
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
 

 



