<?php
 class Crud
 {
   public $registros;
   public $consulta;
   public $ultimo_id;
   public $num_rows;

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
         $this->num_rows=mysql_num_rows($result);
           if($this->num_rows>0)
            { 
               while( $row= mysql_fetch_assoc($result))
               {
                $this->registros[] = $row;
               }
            }
            else
            {
              echo 'No hay registros asociados a la consulta.';
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
               $this->ultimo_id = mysql_insert_id();
             }
             else
               {
                echo mysql_error();
               }
            
           $i++;
       }
      } 

      public function update($consulta,$mensaje,$conexion)
      {
          
         $query =$consulta;
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
//sacar ultimo id
    public function getLastid()
    {
      return $this->ultimo_id;
    }
    
    //cantidad de tuplas
    public function getTuplas()
    {
      return $this->num_rows;
    }

 }



?>