
<?php

 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   // header("Cache-Control: no-cache, must-revalidate"); 
?>
 
 
 
 
 <!-- Sucursales de los centros de costo -->
 
 <table width="900" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
    <th class="margen_der_abj">Suc. N&uacute;mero</th>
    <th class="margen_der_abj">Nombre</th>
    <th class="margen_der_abj">Direcci&oacute;n</th>
    <th class="margen_der_abj">C&oacute;digo</th>

    <th class="margen_der_abj">Acciones</th>
  </tr>
  <?php
 
   $query="SELECT nombre,direccion,codigo FROM sucursal WHERE cliente  ='$_GET[cliente]' AND centro_c ='$_GET[centcos]'
 AND si_activo = 'S'  ORDER BY nombre ASC";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>

    <td align="center" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $i; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($row['nombre']); ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['direccion']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['codigo']; ?></td>
    <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><a style="cursor:pointer"><img src="../_images/info.ico" alt="info" title="Informaci&oacute;n" width="20" height="20" onclick="javascript: fotosuc('<?php echo $row['codigo']; ?>'),ancla()" /> </a><a style="cursor:pointer"><img src="../_images/security.ico" alt="info" title="Seguridad" width="20" height="20" onclick="javascript: est_seg('<?php echo $row['codigo']; ?>'),ancla()"  /> </a><a style="cursor:pointer"><img src="../_images/consignas.ico" alt="info" title="Consignas"  width="20" height="20" onclick="javascript: consignas('<?php echo $row['codigo']; ?>'),ancla()"  /></a><a  href="pag_principal2.php?uid=<?php  echo $row['codigo'];  ?>"style="cursor:pointer"><img src="../_images/caution.ico" alt="info" title="Factores de Riesgo"  width="20" height="20"   /> </a></td>
   
  </tr>
  
  <?php
        $i++;
	   }
	  
	 }
	 mysql_close($connection);
  ?>
</table>

