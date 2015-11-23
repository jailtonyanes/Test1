

<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   
   //para saber la cantidad de centros de costo
   $querycontar="SELECT centros.nombre,sucursal.centro_c
   
FROM
    CVS.sucursal
    INNER JOIN CVS.centros 
        ON (sucursal.centro_c = centros.codigo) WHERE sucursal.cliente='$_GET[uid]'
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
 ?>
    <p align="center" ><a style="cursor:pointer"><img onMouseDown="javascript:new_v()" src="../_images/add.ico" alt="visita" title="Nueva Visita" width="25" height="25" /></a></p> 
    <div id="new_visit" style="width:960px;margin:10px auto;display:none" >
      <fieldset style="width:960px">
       <legend>
       Nueva Visita T&eacute;cnica
       
       </legend>
       <table width="900"  border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <tr colspan="2">
    <td style="background-color:#F0F0F6" class="margen_der_abj" >Fecha:</td>
     <td  style="background-color:#F0F0F6" class="margen_der_abj">  

  

  <input name="desde" type="text" id="desde" readonly="readonly" style="width:191px;" tabindex="6" />

    <button id="desde1" type="button" name="desde1" class="boton_fecha"  tabindex="7">...</button>

                

                <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "desde",

                          dateFormat: "%Y-%m-%d",

                          trigger: "desde1",

                          bottomBar: false,

                          onSelect: function() {

                                 // var date = Calendar.intToDate(this.selection.get());

                                 // LEFT_CAL.args.min = date;

                                //  LEFT_CAL.redraw();

                                  this.hide();
                          }
                  });
                </script>
   </td>
   
  
  </tr>
  <tr colspan="2">
    <td class="margen_der_abj" >Sucursal:</td>
     <td  class="margen_der_abj"><select name="suc" id="suc" style="width:233px">
       <option selected="selected" value="">Escoja opci&oacute;n</option>
           <?php
		    $query="SELECT row_id, nombre FROM sucursal	 WHERE cliente ='$_GET[uid]'  ORDER BY sucursal.nombre ASC  ";
			$result= mysql_query($query,$connection);
			$num_rows=mysql_num_rows($result);
			if($num_rows>0)
			 {
			    while($rowc=mysql_fetch_array($result))
				 {
				   ?>
                      <option  value="<?php echo $rowc['row_id'] ?>"><?php  echo $rowc['nombre']?></option>
				   <?php
				 }
			 }
			 else
			  {
              ?>
               <option selected="selected" value="">No hay valores para la consulta</option>
			  <?php			  
			  }
		 
		   ?>
        </select></td>

  </tr>

    
 
 
</table>
       
       <table width="900"  border="0" id="datos_cli" cellpadding="0" cellspacing="0">
  <?php
   $largo=50;
  ?>
  <tr>
    <td style="background-color:#F0F0F6" class="margen_der_abj">Contacto:</td>
    <td style="background-color:#F0F0F6" class="margen_der_abj"><input name="contac" type="text" id="contac" size="<?php echo $largo ?>" /></td>
    <td style="background-color:#F0F0F6" class="margen_der_abj">Cargo:</td>
    <td style="background-color:#F0F0F6" class="margen_der_abj"><input name="cargo" id="cargo" type="text" size="<?php echo $largo ?>" /></td>
  </tr>
  <tr>
    <td class="margen_der_abj">Vigilante en turno:</td>
    <td class="margen_der_abj"><input name="vigilante" id="vigilante" type="text" size="<?php echo $largo ?>"  /></td>
    <td class="margen_der_abj">Nro visita:</td>
    <td class="margen_der_abj"><input name="nr_visita" id="nr_visita" type="text" size="<?php echo $largo ?>"  /></td>
  </tr>
  <tr>
    <td style="background-color:#F0F0F6" class="margen_der_abj">E-mail cliente:</td>
    <td style="background-color:#F0F0F6" class="margen_der_abj"><input name="emailc" id="emailc" type="text" size="<?php echo $largo ?>"  /></td>
    <td style="background-color:#F0F0F6" class="margen_der_abj">Tel&eacute;fono:</td>
    <td style="background-color:#F0F0F6" class="margen_der_abj"><input name="tel" id="tel" type="text" size="<?php echo $largo ?>"  /></td>
  </tr>
  <tr>
    <td class="margen_der_abj">Reporta:</td>
    <td class="margen_der_abj"><input name="reporte" id="reporte" type="text"  size="<?php echo $largo ?>" /></td>
    <td class="margen_der_abj">E-mail reportante:</td>
    <td class="margen_der_abj"><input name="emailr" id="emailr" type="text" size="<?php echo $largo ?>"  /></td>
  </tr>
</table>
       <table width="900" border="0" cellpadding="0" cellspacing="0">
         <tr>
           <td style="background-color:#F0F0F6" class="margen_der_abj"><label>Comentarios:</label></td>
           <td style="background-color:#F0F0F6" class="margen_der_abj"><textarea name="comentarios" id="comentarios" cols="95" rows=""></textarea></td>
         </tr>
         <tr>
           <td class="margen_der_abj"><label>Compromisos:</label> </td>
           <td class="margen_der_abj"><textarea name="compromisos" id="compromisos" cols="95" rows=""></textarea></td>
         </tr>
         <tr>
           <td style="background-color:#F0F0F6" class="margen_der_abj">
           <label>Asignado a:</label>
           </td>
           <td style="background-color:#F0F0F6" class="margen_der_abj">
               <select name="reasignado" class="TextoNormal" id="reasignado">
            <option value=" " selected="selected">Elija un usuario  </option>
            <?php
			$queryusu="SELECT empleado.cedula,nombres FROM empleado_alt, empleado WHERE empleado_alt.cedula=empleado.cedula AND admin='Y' order by nombres asc";
			$resultusu=mysql_query($queryusu,$connection);
			while($rowusu=mysql_fetch_array($resultusu))
			 {
			 ?>
               <option value="<?php echo $rowusu['cedula']?> " ><?php echo $rowusu['nombres'] ?></option>
			 <?php
			 }
			?>


        
          </select>
            </td>
         </tr>
       </table>
       <p align="center"><input name="saveinto" id="saveinto" type="button" value="Guardar Visita" onclick="javascript:gurada_visita()" /></p>
        <p align="center" ><a style="cursor:pointer"><img onMouseDown="javascript:cerrar_v()" src="../_images/1318203459_list-remove.ico" alt="cerrar" title="Cerrar" width="20" height="20" /></a></p>
      </fieldset>
      
    </div>
 <?php  
   
//para sacar los centros de costo
$query="
SELECT
    centros.nombre,sucursal.centro_c
   
FROM
    CVS.sucursal
    INNER JOIN CVS.centros 
        ON (sucursal.centro_c = centros.codigo) WHERE sucursal.cliente='$_GET[uid]'
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
          
        
           <h3 style="background-color:#A0BBD8; color:#333" > Centro de costo <span ><?php echo '('.$i.')' ?></span> <?php echo '  :  '. $row['nombre'].',  '.Sucursales.':  '?>  <a style="cursor:pointer;color:#FFFF37" onmousedown="javascript:abrir_visitas('<?php echo $rows ?>','<?php echo $i ?>','<?php echo $_GET['uid']?>','<?php echo $ce ?>')"  ><?php echo '('. $nrows .')' ?></a> </h3>
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
        <p>No hay centros de costo asociados a este cliente.</p>
	   <?php
	  }
  }
  else
   {
    echo mysql_error();
   }
 
   mysql_close($connection);

?>

   
   
   
 
