

<?php



 include('../_include/configuration.php');

  $connection=mysql_connect($server,$user,$password);

  mysql_select_db($dbname);

   // header("Cache-Control: no-cache, must-revalidate"); 

?>

 

   <!-- Clientes sin marca asignada  -->

 <h2>Lista de usuarios del Sistema</h2>

    <input type="hidden" name="iden" id="iden" />

     <div id="botonera_e">

      <input type="button" name="eliminar2" id="eliminar2" value="Eliminar" onclick="javascript:delete_clients()"  />

    

      </div>

 <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">

  <tr>

     <th align="center" class="margen_der_abj">

      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>

    <th class="margen_der_abj">Apellidos y Nombres</th>

    <th class="margen_der_abj"># M&oacute;vil</th>

    <th class="margen_der_abj">Celular/tel&eacute;fono</th>

    <th class="margen_der_abj">Direcci&oacute;n</th>
    <th class="margen_der_abj">Placa</th>
    <th class="margen_der_abj">Licencia</th>



     <th class="margen_der_abj">Editar</th>

  </tr>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres



  $query="SELECT * FROM `tivoli`.`conductor` order by conductor_nombre asc;

";

 $result=mysql_query($query,$connection);

 $num_rows=mysql_num_rows($result);

 if($num_rows>0){

	 $i=1;

	 while($row=mysql_fetch_array($result))

	   {

	

  ?>

  

  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>

      <input type="checkbox" name="selected[]" id="identy<?php  echo $row['conductor_id']  ?>" value="<?php echo $row['conductor_id']  ?> " /> 

    </td>

   <td class="margen_der_abj"<?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_cliente(<?php echo $row['conductor_id']; ?>);" style="cursor:pointer;color:#06f;"><?php echo htmlentities($row['conductor_apellido'].' '.$row['conductor_nombre']); ?></a></td>

   

    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_movil']; ?></td>

    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_cel']; ?></td>

    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_direccion']; ?></td>

 <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_placa']; ?></td>
  <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['conductor_lc']; ?></td>


    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: editar_cliente(<?php echo $row['conductor_id']; ?>);" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>

  </tr>

  

  <?php

        $i++;

	   }

	  

	 }



  ?>

</table>

 

 

 



