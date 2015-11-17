  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
  $qbarrio="select pueblo_nombre,pueblo_precio from pueblo where pueblo_id='$_GET[tipo]'";
  $rbarrio=mysql_query($qbarrio,$connection);
  $rowbarrio=mysql_fetch_array($rbarrio);
?>    
 <p >
    <label>* destino:
      <input type="text" name="dest" id="dest" class="ancho" readonly="readonly" value="<?php echo $rowbarrio['pueblo_nombre'] ?>" />
    </label>
  </p>
   <p >
    <label>* zona:
      <input type="text" name="zone" id="zone" class="ancho" readonly="readonly" value="<?php echo 'Zona Pueblos' ?>" />
    </label>
  </p>
  <p >
    <label>* Precio:
      <input type="text" name="price" id="price" class="ancho"  value="<?php echo $rowbarrio['pueblo_precio']?>" onkeypress="return validarnum(event)" />
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
      <input type="button" name="save" id="save" value="Guardar"  class="guarda" onclick="javascript:guardar_servicios()"/>
    </label>
  </p>
<?php	
  mysql_close($connection);
?>


      