<?php
 class Pivote
 {
   public $pivote;
   public $t_dia;
   public $t_noche;
   public $t_descanso;
   public $inicio_turno;

  


  public function llenar($letra,$cantidad)
   {
     $i=1;
     while($i<=$cantidad)
     {
        $this->pivote=$this->pivote.$letra;
        
        $i++;
     }
   }

  public function __construct($t_dia1,$t_noche1,$t_descanso1,$inicio_turno1)
   {
     $this->t_dia=$t_dia1;
     $this->t_noche=$t_noche1;
     $this->t_descanso=$t_descanso1;
     $this->inicio_turno=$inicio_turno1;
     
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

    public function getLongitud()
    {
      return strlen($this->pivote);

    }

 }



?>