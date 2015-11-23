<?php
 class Program
 {
  
   public $fecha_ini;
   public $fecha_fin;
   public $interval;
   
   


  public function __construct($fecha_ini1,$fecha_fin1)
   {
    
     $this->fecha_ini=$fecha_ini1;
     $this->fecha_fin=$fecha_fin1;
      
   }


 

public  function dateDifference($date_1, $date_2,$differenceFormat)
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
   
    $interval1 = date_diff($datetime1, $datetime2);
    return $interval1->format($differenceFormat);
 
}

public function calcular_rango()
 {
    $this->interval= $this->dateDifference($this->fecha_ini,$this->fecha_fin,'%a');
 }

    
    public function getInterval()
    {
      return $this->interval;

    }

    public function sumar_dias($fecha,$cantidad)
    {
      $date = new DateTime($fecha);
      $date->add(new DateInterval('P'.$cantidad.'D'));
      return $date->format('Y-m-d') . "\n";
    }






 /* public function llenar($letra,$cantidad)
   {
     $i=1;
     while($i<=$cantidad)
     {
        $this->pivote=$this->pivote.$letra;
        
        $i++;
     }
   }



  public function llena_pivote()
   {
     if($this->inicio_turno =='1')
       {
         $this->llenar('D',$this->t_dia);
         $this->llenar('N',$this->t_noche);
         $this->llenar('X',$this->t_descanso);         
       }
       else
       {
         $this->llenar('N',$this->t_dia);
         $this->llenar('D',$this->t_noche);
         $this->llenar('X',$this->t_descanso);
         
       }

   }




    
    //cantidad de tuplas
    public function getPivote()
    {
      return $this->pivote;
    }


*/
 }



?>