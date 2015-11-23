<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 
 
 $query="select usuario_nombres,usuario_apellidos,usuario_cedula,usuario_expedida 
FROM usuario WHERE usuario_id=(SELECT MAX(usuario_id) FROM usuario)";
  $result=mysql_query($query,$connection);
  if($result)
   {
        
	    $row= mysql_fetch_array($result);
	 
  }
   else
   {
     echo mysql_error();
   }
  
  mysql_close($connection);
  
?>
 <h3 align="center">CONSENTIMIENTO INFORMADO PARA LA IMPLEMENTACION DEL PROGRAMA DE VIGILANCIA EPIDEMIOLOGICA Y EVALUCACION DE LOS FACTORES DE RIESGO PSICOSOCIALES </h3>
  <fieldset style="width:800px; margin:10px auto">
  <legend style="color:#000">
  Aspecto legal
   </legend>
   <p align="justify">Yo, <?php echo strtoupper($row['usuario_nombres'].' '.$row['usuario_apellidos']) ?>, con C.C # <?php echo $row['usuario_cedula'] ?> expedida en <?php echo strtoupper($row['usuario_expedida']) ?>, doy mi consentimiento para que se realice la implementacion del programa del sistema de vigilancia epidemiol&oacute;gica y la evaluaci&oacute;n de los factores de riesgo psicosociales a los que me he expuesto en mi vida, para mejorar la salud y bienestar del trabajador. Teniendo en cuenta que los datos por mi suministrados, ser&aacute;n utilizados en el marco del sistema de vigilancia epidemiol&oacute;gica que actualmente se est&aacute; llevando a cabo en la empresa, seg&uacute;n la <strong>RESOLUCION 2646 DE 2008</strong> emanada por el Ministerio de la Protecci&oacute;n Social.</p>
   <p align="center"><label for="acepto">T&eacute;rminos legales: </label><select name="acepto" id="acepto" onchange="javascript:decidir()">
     <option>Escoja opci&oacute;n</option>
     <option value="1">Acepto los t&eacute;rminos</option>
     <option value="2">No acepto los t&eacute;rminos</option>
   </select></p>
   
  </fieldset>
  