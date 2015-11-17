

<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   
   //para saber la cantidad de centros de costo
   $querycontar="SELECT centros.nombre,sucursal.centro_c
   
FROM
    CVS.sucursal
    INNER JOIN CVS.centros 
        ON (sucursal.centro_c = centros.codigo) WHERE sucursal.cliente='$_GET[uid]' and sucursal.si_activo = 'S'
         GROUP BY centros.nombre ORDER BY  centros.nombre ASC ";
		 $rcontar=mysql_query($querycontar,$connection);
		 $rows_contar=mysql_num_rows($rcontar);
   //fin
   
   // header("Cache-Control: no-cache, must-revalidate"); 
 $queryi="select * from maesclie WHERE codigo = '$_GET[uid]'";
 $resulti=mysql_query($queryi,$connection);
 if($resulti)
  {
    $rowi=mysql_fetch_array($resulti);
   ?>
     <fieldset>
      <legend>
       Informaci&oacute;n General del Cliente
      </legend>
       
          <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
               <tr >
                 <th style="background-color:#F0F0F6"  class="margen_der_abj" align="left">Nombre: </th>
                  <th style="background-color:#F0F0F6" class="margen_der_abj" align="left"><label><?php echo $rowi['nombre']; ?></label></th>
                 
               </tr>
               <tr>
               <th class="margen_der_abj" align="left">Nit: </th>
               <th class="margen_der_abj" align="left"><label><?php echo $rowi['codigo']; ?></label></th>
               
                
               </tr>
               <tr >
                  <th style="background-color:#F0F0F6" class="margen_der_abj" align="left"> Direcci&oacute;n de cobros: </th>
                 <th style="background-color:#F0F0F6" class="margen_der_abj" align="left"><label><?php echo $rowi['direccion1']; ?></label></th>
                </tr>
                <tr>
                 <th  class="margen_der_abj" align="left">Direcci&oacute;n de env&iacute;os: </th>
                 <th class="margen_der_abj" align="left"><label><?php echo $rowi['direccion1']; ?></label></th>
               </tr>
             
               <tr >
                 <th style="background-color:#F0F0F6"  class="margen_der_abj" align="left">Ciudad: </th>
               <th style="background-color:#F0F0F6"  class="margen_der_abj" align="left"> <label><?php echo $rowi['ciudad']; ?></label></th>
                
               </tr>
               <tr>
                 <th class="margen_der_abj" align="left">Tel&eacute;fono: </th>
                <th class="margen_der_abj" align="left"> <label><?php echo $rowi['telefono1']; ?></label></th>
               </tr>
                <tr>
                 <th style="background-color:#F0F0F6" class="margen_der_abj" align="left">Centros de costo: </th>
                <th  style="background-color:#F0F0F6" class="margen_der_abj" align="left"> <label ><?php echo $rows_contar; ?></label></th>
               </tr>
          </table>
     </fieldset>
 <?php  
  }
  else
   {
 
	echo mysql_error();
   }
//para sacar los centros de costo
$query="
SELECT
    centros.nombre,sucursal.centro_c
   
FROM
    CVS.sucursal
    INNER JOIN CVS.centros 
        ON (sucursal.centro_c = centros.codigo) WHERE sucursal.cliente='$_GET[uid]' and sucursal.si_activo = 'S'
         GROUP BY centros.nombre ORDER BY  centros.nombre ASC ";
 $result=mysql_query($query,$connection);
 if($result)
  {
    $rows=mysql_num_rows($result);
	if($rows>0)
	 {
       $i=1;
	  while($row=mysql_fetch_array($result))
	    {
		  $ce= $row['centro_c'];
		  //contar las sucursales por cada centro de costo
		   $sucursales="SELECT nombre FROM sucursal WHERE cliente  = '$_GET[uid]' AND centro_c = '$row[centro_c]'AND 
si_activo = 'S' ORDER BY nombre asc";
            $result_sucursales=mysql_query($sucursales,$connection);
			$nrows=mysql_num_rows($result_sucursales);
		  //fin
		  ?>
          
        
           <h3 style="background-color:#A0BBD8; color:#333" > Centro de costo <span ><?php echo '('.$i.')' ?></span> <?php echo '  :  '. $row['nombre'].',  '.Sucursales.':  '?>  <a style="cursor:pointer;color:#FFFF37" onmousedown="javascript:abrir('<?php echo $rows ?>','<?php echo $i ?>','<?php echo $_GET['uid']?>','<?php echo $ce ?>')"  ><?php echo '('. $nrows .')' ?></a> </h3>
		  <div id="<?php echo 'd'.$i; ?>" style="display:none" >
           
          </div>
		  <?php
		  
		 
		 $i++;
		}
	   ?>
       <p align="center" ><img onMouseDown="javascript:cerrar_main()" src="../_images/1318203459_list-remove.ico" alt="cerrar" title="Cerrar" width="20" height="20" /></p>
	   <?php
	 }
	 else
	  {
	   ?>
        <p>No hay centros de costo asociados a este cliente.</p>
	   <?php
	  }
  }
  else
   {
    echo mysql_error();
   }
 


?>

   
   
   
 
