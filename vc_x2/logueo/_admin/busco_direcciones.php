<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  
  $_GET['dato2'] = str_replace('-', ' ', $_GET['dato2']);
  $_GET['dato3'] = str_replace('-', ' ', $_GET['dato3']);
  
  switch ($_GET['dato1']) {
    case '1':
        $complemento=" where calle2.calle_nro = '$_GET[dato2]' and carrera2.carrera_nro = '$_GET[dato3]' ";
        break;
    case '2':
        $diag= 'DIAG '.$_GET['dato3'];
		$complemento=" where calle2.calle_nro = '$_GET[dato2]' and carrera2.carrera_nro = '$diag' ";
        break;
    case '3':
        $complemento=" where  carrera2.carrera_nro= '$_GET[dato2]' and calle2.calle_nro = '$_GET[dato3]' ";
        break;
	case '4':
         $diag= 'DIAG '.$_GET['dato3'];
		 $complemento=" where  carrera2.carrera_nro= '$_GET[dato2]' and calle2.calle_nro = '$diag' ";
        break;
    case '5':
         $diag= 'DIAG '.$_GET['dato2'];
		 $complemento=" where  carrera2.carrera_nro= '$diag' and calle2.calle_nro = '$_GET[dato3]' ";
        break;
    case '6':
        $complemento=" where  calle2.calle_nro= '$diag' and carrera2.carrera_nro = '$_GET[dato3]' ";
        break;	
}
  
   
 $qbarrio="SELECT  barrio2.barrio_id,barrio2.barrio_nombre, barrio2.barrio_precio, carrera2.carrera_nro, calle2.calle_nro
FROM carrera2 INNER JOIN (barrio_carrera INNER JOIN ((barrio2 INNER JOIN barrio_calle ON barrio2.barrio_id = barrio_calle.barrio_id)
INNER JOIN calle2 ON barrio_calle.calle_id = calle2.calle_id) ON barrio_carrera.barrio_id = barrio2.barrio_id) ON carrera2.carrera_id =
barrio_carrera.carrera_id $complemento group by barrio_id,barrio_nombre ";
  $rbarrio=mysql_query($qbarrio,$connection);
  $rowbarrio=mysql_fetch_array($rbarrio);
?>    
 <p >
    <label>* destino:
      <input type="text" name="dest" id="dest" class="ancho" readonly="readonly" value="<?php echo $rowbarrio['barrio_nombre'] ?>" />
    </label>
  </p>
   <p >
    <label>* zona:
      <input type="text" name="zone" id="zone" class="ancho" readonly="readonly" value="<?php echo 'Zona '.$rowbarrio['zona_nombre'] ?>" />
    </label>
  </p>
  <p >
    <label>* Precio:
      <input type="text" name="price" id="price" class="ancho"  value="<?php echo $rowbarrio['barrio_precio'] ?>" onkeypress="return validarnum(event)" />
    </label>
  </p>
	
   <p>
    <label>* M&oacute;vil:
      <select name="movil" id="movil" class="ancho">
        <option value="0" selected="selected">Escoja Opci&oacute;n</option>
        <?php 
         $qmovil="SELECT conductor_id, conductor_movil  from conductor order by conductor_movil asc";
		 $rmovil=mysql_query($qmovil,$connection);
		 $nrmovil=mysql_num_rows($rmovil);
		 if($nrmovil>0)
		  {
		    while($rowmovil=mysql_fetch_array($rmovil))
			 {
		  ?>
              <option value="<?php echo $rowmovil['conductor_id'] ?>" ><?php echo $rowmovil['conductor_movil'] ?></option>
		  <?php  
			 }
		  }
		  else
		  {
		 ?>
            <option value="0">No hay conductores</option>
		<?php  
		  }
		?>
	  
       
       
      </select>
    </label>
    
  </p>
  <p >
    <label>* Cupo:
      <input type="text" name="cupo" id="cupo" class="ancho" onkeypress="return validarnum(event)"  />
    </label>
  </p>
     <p>
    <label>
      <input type="button" name="save" id="save" value="Guardar"  class="guarda" onclick="javascript: guardar_servicios()"/>
    </label>
  </p>
<?php	
  mysql_close($connection);
?>


      