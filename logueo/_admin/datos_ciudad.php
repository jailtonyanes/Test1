  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

   $query="select * from ciudad where ciudad_id='$_GET[uid]'";
 $result=mysql_query($query,$connection);
 if($result)
 {
  $row=mysql_fetch_array($result);
 }
 mysql_close($connection);
?>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" />
   <p>
    <label>* Nombre de la ciudad:
      <input type="text" name="ciudad" id="ciudad"value="<?php echo $row['ciudad_nombre']; ?>" />
    </label>
  </p>


  <p>
    
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_calzado()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    
  </p>