<?php
 include('../_include/configuration.php');

  $connection=mysql_connect($server,$user,$password);

  mysql_select_db($dbname);

   // header("Cache-Control: no-cache, must-revalidate"); 
function resultados($pertenece_a,$puntuacion,$pivote)
	    {
			  if( ($pertenece_a == $pivote && $puntuacion == 1)  )
			 {
			   $respuesta=  'Siempre';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 2) )
			 {
			   $respuesta= 'Casi Siempre';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 3)  )
			 {
			   $respuesta= 'Algunas Veces';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 4) )
			 {
			   $respuesta= 'Casi Nunca';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 5) )
			 {
			   $respuesta= 'Nunca';	 
			 }
			  return $respuesta;
		}
		
function resultados2($pertenece_a,$puntuacion,$pivote)
	    {
			  if( ($pertenece_a == $pivote && $puntuacion == 1)  )
			 {
			   $respuesta=  'Si';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 2) )
			 {
			   $respuesta= 'No';	 
			 }
			
			  return $respuesta;
		}
		
function resultados3($pertenece_a,$puntuacion,$pivote)
	    {
			  if( ($pertenece_a == $pivote && $puntuacion == 1)  )
			 {
			   $respuesta=  'Nunca';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 2) )
			 {
			   $respuesta= 'Una Vez';	 
			 }
			
			 if( ($pertenece_a == $pivote && $puntuacion == 3)  )
			 {
			   $respuesta=  'De dos a tres veces';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 4) )
			 {
			   $respuesta= 'M&aacute; de tres veces';	 
			 }
			
			  return $respuesta;
		}		

function resultados4($pertenece_a,$puntuacion,$pivote)
	    {
			 
			 if( ($pertenece_a == $pivote && $puntuacion == 0)  )
			 {
			   $respuesta=  '0%';	 
			 }
			 if( ($pertenece_a == $pivote && $puntuacion == 1)  )
			 {
			   $respuesta=  '1%';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 2) )
			 {
			   $respuesta= '2%';	 
			 }
			
			 if( ($pertenece_a == $pivote && $puntuacion == 3)  )
			 {
			   $respuesta=  '3%';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 4) )
			 {
			   $respuesta= '4%';	 
			 }
			   if( ($pertenece_a == $pivote && $puntuacion == 5)  )
			 {
			   $respuesta=  '5%';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 6) )
			 {
			   $respuesta= '6%';	 
			 }
			
			 if( ($pertenece_a == $pivote && $puntuacion == 7)  )
			 {
			   $respuesta=  '7%';	 
			 }
			   if(($pertenece_a == $pivote && $puntuacion == 8) )
			 {
			   $respuesta= '8%';	 
			 }
			   if( ($pertenece_a == $pivote && $puntuacion == 9)  )
			 {
			   $respuesta=  '9%';	 
			 }
			  if(($pertenece_a == $pivote && $puntuacion == 10) )
			 {
			   $respuesta= '10%';	 
			 }
			
			 if( ($pertenece_a == $pivote && $puntuacion == 11)  )
			 {
			   $respuesta=  '11%';	 
			 }
			 
			
			  return $respuesta;
		}		



?>

<h3 align="center" style="color:#000"> RESPUESTAS INDIVIDUALES ORDENADAS POR TIPO DE ENCUESTA </h3>
<?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres
  $query="SELECT  e.encuesta_nombre,e.encuesta_id FROM encuesta e ORDER BY e.encuesta_nombre asc";

 $result=mysql_query($query,$connection);

 $num_rows=mysql_num_rows($result);

 if($num_rows>0){

	 
?>
<?php
	 while($row=mysql_fetch_array($result))

	   {

	

  ?>
<h3 align="center" style="color:#000"><?php echo $row['encuesta_nombre'] ?></h3>
<div class="r" style=" height: 200px; margin: 10px auto;
    overflow: auto;
    width: 631px;">
  <table width="auto" border="0" id="datos_cli" cellpadding="0" cellspacing="0">
    <tr>
      <th class="margen_der_abj">Pregunta</th>
      <th class="margen_der_abj">Calificaci&oacute;n</th>
    </tr>
    
<?php
  $querya=" SELECT
   
     calificacion.calficacion_puntuacion
    , preguntas.pregunta_contenido,preguntas.pertenece_a
  
FROM
    encuesta2.calificacion
    INNER JOIN encuesta2.preguntas 
        ON (calificacion.pregunta_id = preguntas.pregunta_id)
    INNER JOIN encuesta2.usuario_cal 
        ON (usuario_cal.calificacion_id = calificacion.calificacion_id)
    INNER JOIN encuesta2.usuario 
        ON (usuario_cal.usuario_id = usuario.usuario_id) WHERE usuario.usuario_cedula='$_GET[ced]'
         AND preguntas.encuesta_id='$row[encuesta_id]';      
        ";

 $result2=mysql_query($querya,$connection);

 $num_rows2=mysql_num_rows($result2);

 if($num_rows2>0){
    $i=1;
	while($row2=mysql_fetch_array($result2))

	   {
             
?>
    <tr>
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
        <?php echo $row2['pregunta_contenido'] ?>
        </td>
      <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>
      <?php    
	   
	
	   switch ($row2['pertenece_a'])
	                {
					   case 'CAMB':
							  echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'CAMB');
							 break;
					   case 'CTRB':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'CTRB');
							 break;
					   case 'EFM':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'EFM');
							 break;		 
					   case 'REST':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'REST');
						 break;
					   
					   case 'JRNT':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'JRNT');
						 break;
						 
						 
					   case 'DESC':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'DESC');
						 break;
						 
					    case 'CATB':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'CATB');
						 break;	 
						 
						  case 'INYO':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'INYO');
						 break;	
						 
						  case 'CAPY':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'CAPY');
						 break;
						 case 'JEFE':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'JEFE');
						 break;
						 
						  case 'RELP':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'RELP');
						 break;
						 
						  case 'REND':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'REND');
						 break;
						 case 'SSR':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'SSR');
						 break;
						 case 'ATC':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'ATC');
						 break;
						 case 'SUP':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'SUP');
						 break;
						 case 'ZON':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'ZON');
						 break;
						 case 'VFTR':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'VFTR');
						 break;
						
						 case 'ESTR':
							 echo resultados($row2['pertenece_a'],$row2['calficacion_puntuacion'],'ESTR');
						 break;
						 case 'EXTL':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'EXTL');
						 break;
						 case 'AM':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM');
						 break;
						 case 'AM1':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM1');
						 break;
						 case 'AM2':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM2');
						 break;
						 case 'AM3':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM3');
						 break;
						 case 'AM4':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM4');
						 break;
						 case 'AM5':
							 echo resultados3($row2['pertenece_a'],$row2['calficacion_puntuacion'],'AM5');
						 break;
						 case 'PR':
							 echo resultados4($row2['pertenece_a'],$row2['calficacion_puntuacion'],'PR');
						 break;
						 
						 case 'MR1':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'MR1');
						 break;
						  case 'MR2':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'MR2');
						 break;
						  case 'MR3':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'MR3');
						 break;
						  case 'MR4':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'MR4');
						 break;
						 
						 case 'TPC1':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'TPC1');
						 break;
						 
						  case 'TPC2':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'TPC2');
						 break;
						  case 'TPC3':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'TPC3');
						 break;
						   case 'TPC4':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'TPC4');
						 break;
						 
						  case 'OST':
							 echo resultados2($row2['pertenece_a'],$row2['calficacion_puntuacion'],'OST');
						 break;
                   }
	   
	  
		 
	    
	 
	  
	  ?>
        </td>
    </tr>
 <?php
	    $i++;
	   }
 }
   
 ?>
  
  
  </table>
</div>
<?php

        

	   }

	  

	 }



  ?>
</br>
</br>
