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

 <h2>Lista de Sucursales</h2>

    <input type="hidden" name="iden" id="iden" />

     <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     <th align="center" class="margen_der_abj">

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>

    <th class="margen_der_abj">Cliente</th>    
    <th class="margen_der_abj">Departamento</th>
    <th class="margen_der_abj">Municipio</th>
    <th class="margen_der_abj">Sucursal Nombre</th> 
    <th class="margen_der_abj">Sucursal Direccion</th>
    <th class="margen_der_abj">Sucursal Telefono</th>
    <th class="margen_der_abj">Contacto</th>
    <th class="margen_der_abj">Email Contacto</th>
    <th class="margen_der_abj">Telefono Contacto</th>





     <th class="margen_der_abj">Editar</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT
   `sucursal`.`sucursal_id`
   ,sucursal_nombre
   , `sucursal`.`cliente_id`
   ,cliente.`cliente_nombre`
   , `sucursal`.`sucursal_direccion`
   , `sucursal`.`sucursal_contacto_telefono`
   , `sucursal`.`sucursal_contacto_nombre`
   , `sucursal`.`sucursal_contacto_email`
   , `sucursal`.`departamento_id`
   , `sucursal`.`municipio_id`
   , `sucursal`.`sucursal_telefono`
   , `departamento`.`departamento_nombre`
   , `municipio`.`municipio_nombre`
FROM
   `cliente`
   INNER JOIN `sucursal` 
       ON (`cliente`.`cliente_id` = `sucursal`.`cliente_id`)
   INNER JOIN `departamento` 
       ON (`departamento`.`departamento_id` = `sucursal`.`departamento_id`)
   INNER JOIN `municipio` 
       ON (`municipio`.`municipio_id` = `sucursal`.`municipio_id`)ORDER BY cliente_nombre ASC,departamento_nombre ASC,
       municipio_nombre ASC,sucursal_nombre ASC");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos1))
   {   


  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $datos1[$i]['sucursal_id']  ?>" value="<?php echo $datos1[$i]['sucursal_id']  ?> " /> 

    </td>

    
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['cliente_nombre'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['departamento_nombre'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['municipio_nombre'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_nombre'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_direccion'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_telefono'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_contacto_nombre'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_contacto_email'] ?></td>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $datos1[$i]['sucursal_contacto_telefono'] ?></td>
    
    
 <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: subir();editar_cliente(<?php echo $datos1[$i]['sucursal_id'] ?>)" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>
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
 

 



