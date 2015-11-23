
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
 
 
 
 
 <!-- Clientes con marca asignada  -->
 <h2>&nbsp;</h2>
    <input type="hidden" name="iden" id="iden" />
     <div id="botonera">
      <input type="button" name="eliminar" id="eliminar" value="Eliminar" onclick="javascript:delete_clients()"  />
    <!--  <input type="button" name="activar" id="activar" value="Activar" onclick="javascript:activate_cliente(1)"  />
      <input type="button" name="desactivar" id="desactivar" value="Desactivar" onclick="javascript:activate_cliente(0)"  /> !-->
      </div>
 <table width="800" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" class="margen_der_abj">
      <input type="checkbox" name="checkbox" id="checkbox" onclick="checkTodos(this.id,'view_cli');" /></th>
    <th class="margen_der_abj">Categor&iacute;a</th>
    <th class="margen_der_abj">Subcategor&iacute;a</th>
   
    <th class="margen_der_abj">Editar</th>
  </tr>
  <?php
   //concat(cliente_apellido,' ',cliente_nombre) as nombres
   $query="SELECT
     subcategoria_id     
    ,categoria.categoria_nombre
    , subcategoria.subcategoria_nombre
FROM
    ew.subcategoria
    INNER JOIN ew.categoria 
        ON (subcategoria.categoria_id = categoria.categoria_id)
ORDER BY categoria.categoria_nombre ASC, subcategoria.subcategoria_nombre ASC;
";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6"';} ?>>
      <input type="checkbox" name="selected[]" id="identy<?php echo $row['subcategoria_id']?>" value="<?php echo $row['subcategoria_id']?>" />
    </td>
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo strtoupper($row['categoria_nombre']); ?></td>
    <td class="margen_der_abj"<?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a  onclick="javascript: editar_cliente(<?php echo $row['subcategoria_id']; ?>);" style="cursor:pointer;color:#06f;"><?php echo strtoupper($row['subcategoria_nombre']) ?></a></td>
   
   <!-- <td align="right" class="margen_der_abj" <?php // if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php // echo '$'.number_format($row['zona_precio'],2,',','.'); ?></td> !-->
    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a onclick="javascript: subir();editar_cliente(<?php echo $row['subcategoria_id']; ?>)" style="cursor:pointer;color:#A0BBD8;"><img src="../_images/edit.ico" alt="Edit Icon"  ></a> </td>
  </tr>
  
  <?php
        $i++;
	   }
	  
	 }
	 mysql_close($connection);
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

