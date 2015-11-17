<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>        
        
        
        <option value="0" selected="selected">Escoja factura</option>
        <?php
		 $query="SELECT importacion.importacion_numero, importacion.importacion_id
FROM (cliente_linea
INNER JOIN
((importacion_linea
INNER JOIN
importacion ON importacion_linea.importacion_id=importacion.importacion_id)
INNER JOIN
linea ON importacion_linea.linea_id=linea.linea_id) ON cliente_linea.linea_id=linea.linea_id)
INNER JOIN cliente ON cliente_linea.cliente_id=cliente.cliente_id where cliente.cliente_id='$_GET[uid]'
GROUP BY importacion.importacion_numero, importacion.importacion_id
ORDER BY importacion.importacion_numero";
		 $result=mysql_query($query,$connection);
		 $num_rows=mysql_num_rows($result);
		 if($num_rows>0){
		  while($row=mysql_fetch_array($result))
		   {
		  ?>
              <option value="<?php echo $row['importacion_id'] ?>"><?php echo $row['importacion_numero'] ?></option>
		  <?php 
		   }
		 }
		 mysql_close($connection);
		?>