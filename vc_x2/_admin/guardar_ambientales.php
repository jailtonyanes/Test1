<?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
        
		//saco el maximo id hasta el momento
		 $queryid="SELECT MAX(usuario_id)as maxi FROM usuario";
		 $result_id=mysql_query($queryid,$connection);
		 $rowid=mysql_fetch_array($result_id);
		 $maximo=$rowid['maxi'];
		//
		
		$sw=0;$tx=0;
		foreach($_POST as $nombre_campo => $valor)
		{
		  
		   if($valor=='')
		    {
			  $sw=1;
			}
		}
		
		if($sw==1)
		 {
		   echo'Verifique que no haya dejado preguntas  sin contestar.';
		 }
		 else
		  {
		     foreach($_POST as $nombre_campo => $valor)
				{
				 $query="INSERT INTO calificacion (calficacion_puntuacion,pregunta_id)VALUES('$valor','$nombre_campo')";
				  $result= mysql_query($query,$connection);
				  $ult= mysql_insert_id();
				  //$fecha=date('Y-m-d');
				  $fecha=date('Y-m-d');
		 $query="INSERT INTO usuario_cal(usuario_id,calificacion_id,fecha_calificacion)VALUES('$_POST[docu]','$ult','$fecha')"; 
				  $result= mysql_query($query,$connection);
				  //actualizo los que faltan
				  $query="update calificacion set p_episodio='$_POST[primer_episodio]',produjo='$_POST[produjo]',mejora='$_POST[mejora]',empeora='$_POST[empeora]',sintomas='$_POST[sintomas]',ev_med='$_POST[evaluacion]',ayuda_d='$_POST[apis]',cual_ayuda='$_POST[cuales]',diagnostico_f='$_POST[diagnose]',tratamiento= '$_POST[trata]',tipo_t= '$_POST[tipo_de_t]', tiempo_inca = '$_POST[tinca]',cuantas_inca='$_POST[vinca]',secuelas='$_POST[secuelas]',secuelas_tipo='$_POST[tipo_de]',pq='$_POST[pq]' where calificacion_id = '$ult'"; 
				  $result= mysql_query($query,$connection);
				  
				  //borro lo que no sirva
				  $query="DELETE FROM calificacion WHERE calificacion.calficacion_puntuacion  = 0"; 
				  $result= mysql_query($query,$connection);
				  
				  
				  $tx=1;
				}
			
		  }

       if($tx==1)
	    {
		   
		  $query_parte="select usuario_parte from usuario where usuario_cedula='$_POST[docu]'";
		   $result_parte=mysql_query($query_parte,$connection);
		   $row_parte=mysql_fetch_array($result_parte);
		   $parte= $row_parte['usuario_parte']+1;
		   //actualizo la parte de la encuesta
			  $query="update usuario set usuario_parte = '$parte' WHERE usuario_cedula	  = '$_POST[docu]'"; 
				  $result= mysql_query($query,$connection);
		  echo 'ok';
		  
		}
 

			
  mysql_close($connection);
?>
