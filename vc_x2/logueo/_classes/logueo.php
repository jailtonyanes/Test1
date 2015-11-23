<?php
  class Logueo
 {
    public $tipo_usuario;
    public $num_entradas;
    public $cedula;
    public $fecha;
    public $hora;
    public $array_v;
    public $mensaje_salida;
    public $sw;
    public $tipo_logeo;
    public $dia_semana;
    

    
   public function sabados()
   {

             switch ($this->num_entradas) 
        {
		         

                    case 0:
		                  $this->array_v[0]= "'$this->fecha','$this->cedula','INGRESO','$this->hora'";
		                  $this->mensaje_salida='Ingreso a la empresa';
		                 break;
		           
		            case 1:
		                $this->array_v[0]= "'$this->fecha','$this->cedula','FIN JORNADA','$this->hora'";
		                    $this->mensaje_salida='Fin de jornada laboral';
		                break;

		            default:
		              $this->sw=1;
		            break;        
       }
  
   }

public function dias_normales()
 {
 	     switch ($this->num_entradas) 
        {
		         

                    case 0:
		                  $this->array_v[0]= "'$this->fecha','$this->cedula','INGRESO','$this->hora'";
		                  $this->mensaje_salida='Ingreso a la empresa';
		                 break;
		            case 1:
		                  $this->array_v[0]= "'$this->fecha','$this->cedula','SALIDA A ALMORZAR','$this->hora'";
		                  $this->mensaje_salida='Salida a almorzar';
		                break;
		            case 2:
		               $this->array_v[0]= "'$this->fecha','$this->cedula','REGRESO DE ALMUERZO','$this->hora'";
		                     $this->mensaje_salida='Regreso del almuerzo';
		                break;
		            case 3:
		                $this->array_v[0]= "'$this->fecha','$this->cedula','FIN JORNADA','$this->hora'";
		                    $this->mensaje_salida='Fin de jornada laboral';
		                break;

		            default:
		              $this->sw=1;
		            break;        
       }
 }

    public function registrar_ingreso()
    {
      
      $this->sw=0;
      if($this->tipo_usuario=='1' || $this->tipo_usuario=='2' )
      {
        
        $this->log_vigi_col();   
      }
      else
      {
        
         $this->log_otros();
      }
    } 	

    public function __construct ($fecha1,$tipo_usuario1,$hora1,$num_entradas1,$cedula1,$tipo_logeo1,$dia_semana1)
    {
       $this->fecha=$fecha1;
       $this->tipo_usuario=$tipo_usuario1;
       $this->hora=$hora1;
       $this->num_entradas=$num_entradas1;
       $this->cedula=$cedula1;
       $this->tipo_logeo=$tipo_logeo1;
       $this->dia_semana=$dia_semana1;
    }
    
    public function log_vigi_col()
    {
          switch ($this->tipo_logeo) 
        {
            

            case 'FIN JORNADA':                   
                  $this->array_v[0]= "'$this->fecha','$this->cedula','INGRESO','$this->hora'";
                  $this->mensaje_salida='Ingreso a la empresa';
                 break;
            case 'INGRESO':
                  $this->array_v[0]= "'$this->fecha','$this->cedula','FIN JORNADA','$this->hora'";
                  $this->mensaje_salida='Fin de jornada laboral';
                break;
            default:
              $this->sw=1;
            break;        
       }   
      
    }

    public function log_otros()
    {
         //
          if($this->dia_semana=='6')
          {
            $this->sabados();
          }
         else
         {
            $this->dias_normales();
         }
         //



    }
    
     public function getArray()
	  {
	    return $this->array_v[0]; 
	  }

      public function getMensaje()
	  {
	    return $this->mensaje_salida; 
	  } 

        public function getSw()
	  {
	    return $this->sw; 
	  } 
 



 }

?>