<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 
 

  
  if($_GET['uid']==2)
   {
   ?>

<h2><?php echo 'Gracias por su tiempo.' ?></h2>
<?php 
   }
   else
    {
	     
		   ?>
<p align="center" style="font-size:16"><strong>Encuesta Intralaboral</strong></p>
<p align="center" style="font-size:16"><strong>Cantidad de trabajo a su cargo</strong></p>
<form id="uno" name="uno" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="docu" id="docu" />
  <table width="800" border="0" id="datos_cli" cellpadding="0" cellspacing="0" style="margin:5px auto">
    <?php
			  $query="SELECT * FROM preguntas WHERE encuesta_id =1 AND pertenece_a = 'EFM'";
  $result=mysql_query($query,$connection);
  if($result)
   {
        $i=1;
	    while($row=mysql_fetch_array($result))
		 {
			 ?>
    <tr>
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><?php echo $row['pregunta_contenido'] ?></td>
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><select name="<?php echo $row['pregunta_id'] ?>" id="<?php echo $row['pregunta_id'] ?>" class="tipo">
          <option selected="selected" value="">Escoja opci&oacute;n</option>
          <option value="1">Siempre</option>
          <option value="2">Casi Siempre</option>
          <option value="3">Algunas Veces</option>
          <option value="4">Casi Nunca</option>
          <option value="5">Nunca</option>
        </select></td>
    </tr>
    <?php
		   $i++;
		 }
		 ?>
  </table>
  <p align="center">
    <input name="Savein" id="Savein" type="button" value="siguiente" onclick="javascript: guardar_ambientales()" />
  </p>
</form>
<?php
	 
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
	}
?>
