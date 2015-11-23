<?php
 class Crud
 {
   public $registros;
   public $consulta;
   public $ultimo_reg;
   
   
   
   
  
   
	 public function setConsulta($consulta1)
	  {
        $this->consulta = $consulta1;
       }

 //seleccionar
 public function seleccionar($conexion)
    {
		   $query=$this->consulta;
		  $result=mysql_query($query,$conexion);
		  if($result)
		   {
			 while( $row= mysql_fetch_assoc($result))
			  {
				 $this->registros[] = $row;
			  }
		   }
       else
       {
         echo mysql_error();
       }
	 
	   return  $this->registros;
	}

//insertar en la tabla
//recuerde ponerle a cada campo del fomrmulario, el nombre del campo en la tabla
     public function insertar($valores,$campos,$tabla,$conexion,$mensaje_exito)
      {
         $i=0;  $sw=0;
         while ($i<sizeof($valores))
	  	 {
         $query= "insert into $tabla ($campos) values (".$valores[$i].")";     
           $result= mysql_query($query,$conexion);
           if($result)
           	 {
           	   echo $mensaje_exito;
           	 }
           	 else
           	 	 {
           	 	 	echo mysql_error();
           	 	 }
            
           $i++;
	  	 }
      }  
     
	
  //eliminar
      public function eliminar($tabla,$conexion,$condicion,$mensaje)
       {
         if($condicion != '')
         	 {
         	   $where = 'where';
         	 }
         	 else
         	 	 {
         	 	 	$where = '';
         	 	 }
         $query = "delete from $tabla $where $condicion ";
         $result= mysql_query($query,$conexion);
         if($result)
          {
            echo $mensaje;
          }  
          else
          	 {
          	  echo mysql_error();
          	 }

       }

 }


?>