<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   

$query="
 SELECT
       COUNT(caso_cvs.Reporte)AS tot_visit 
       ,caso_cvs.Usuario
 , empleado.p_apellido
    , empleado.s_apellido    
    , empleado.nombres
   FROM

    CVS.caso_cvs
    INNER JOIN CVS.caso_cvs_novedades 
        ON (caso_cvs.Novedad = caso_cvs_novedades.id)
    INNER JOIN CVS.empleado 
        ON (caso_cvs.Usuario = empleado.cedula) WHERE caso_cvs.Cliente='$_GET[cliente]' and caso_cvs_novedades.AF='si' AND YEAR(caso_cvs.Fecha)='$_GET[y]'
 GROUP BY Usuario ORDER BY empleado.p_apellido ASC ;  
";
 $result=mysql_query($query,$connection);
 if($result)
  {
    $rows=mysql_num_rows($result);
	if($rows>0)
	 {
       $i=1;
	  while($row=mysql_fetch_array($result))
	    {
		   ?>
          
        
           <h3 style="background-color:#A0BBD8; color:#333" > <?php echo '('.$i.') ' ?>Nombre del funcionario <span ></span> <?php echo '  :  '. $row['p_apellido'].' '.$row['s_apellido'].' '.$row['nombres'].', ' ?>  <a style="cursor:pointer;color:#00C" onmousedown="javascript:abrir_mr_v('<?php echo $row['Usuario'] ?>','<?php echo $_GET['y'] ?>','<?php echo $_GET['cliente'] ?>','<?php echo $i ?>','<?php echo $rows ?>')"  ><?php echo 'Cantidad de visitas'. '('.$row['tot_visit'].')' ?></a> </h3>
		  <div id="<?php echo 'd'.$i; ?>" style="display:none" >
           
          </div>
		  <?php
		  
		 
		 $i++;
		}
	   ?>
       <p align="center" ><a style="cursor:pointer"><img onMouseDown="javascript:cerrar_main()" src="../_images/1318203459_list-remove.ico" alt="cerrar" title="Cerrar" width="20" height="20" /> </a></p>
	   <?php
	 }
	 else
	  {
	   ?>
        <p>No hay registros asocioados a esta consulta.</p>
	   <?php
	  }
  }
  else
   {
    echo mysql_error();
   }



?>
<?php
//saco las novedades del señor adolfo
  $queryn="SELECT
 COUNT(caso_cvs.id) as casos
FROM
    CVS.caso_cvs
    INNER JOIN CVS.caso_cvs_novedades 
        ON (caso_cvs.Novedad = caso_cvs_novedades.id)WHERE caso_cvs_novedades.AF='si' and caso_cvs.Cliente='$_GET[cliente]' AND YEAR(caso_cvs.Fecha)='$_GET[y]'";
		$resultn=mysql_query($queryn,$connection);
		$rown=mysql_fetch_array($resultn);
?>
 <p align="center">Cantidad de visitas realizadas: <?php echo $rown['casos']; $piso= $rown['casos']; ?></p>
<?php		
//
?>
 
 <!-- Consolidado de visitas -->
 
 <table width="900" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr>
   <th class="margen_der_abj">Novedad</th>
    <th class="margen_der_abj">Cantidad</th>
    <th class="margen_der_abj">Porcentaje</th>
   
  </tr>
  <?php
 
    $query="SELECT
    caso_cvs_novedades.Nombre
    ,COUNT(caso_cvs_novedades.Nombre)AS tot1
  
FROM
    CVS.caso_cvs
    INNER JOIN CVS.caso_cvs_novedades 
        ON (caso_cvs.Novedad = caso_cvs_novedades.id)WHERE caso_cvs_novedades.AF='si'
         AND caso_cvs.Cliente='$_GET[cliente]' AND YEAR(caso_cvs.Fecha)='$_GET[y]' GROUP BY caso_cvs_novedades.Nombre
;         
     ";
 $result=mysql_query($query,$connection);
 $num_rows=mysql_num_rows($result);
 if($num_rows>0){
	 $i=1;
	 while($row=mysql_fetch_array($result))
	   {
	
  ?>
  
  <tr>

    <td align="left" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($row['Nombre']); ?></td>
    <td align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo htmlentities($row['tot1']); ?></td>
    <td  align="right" class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo number_format(($row['tot1']/$piso*100),2,',','.').'%'; ?></td>

   
  </tr>
  
  <?php
        $i++;
	   }
	  
	 }
	 mysql_close($connection);
  ?>
</table>
