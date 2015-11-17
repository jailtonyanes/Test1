  
  <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);

   $query="select * from mercancia where mercancia_id='$_GET[uid]'";
 $result=mysql_query($query,$connection);
 if($result)
 {
  $row=mysql_fetch_array($result);
 }
 mysql_close($connection);
?>
   <div id="datos">
    <h2 style="margin-top:5px">Editar</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" />
   <p>
    <label>*Tipo de mercanc&iacute;a:
      <input type="text" name="mercancia" id="mercancia"value="<?php echo $row['mercancia_nombre']; ?>" class="ancho" />
    </label>
  </p>


  <p>
     <div id="botonera2">
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_calzado()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    </div>
  </p>
  </div>