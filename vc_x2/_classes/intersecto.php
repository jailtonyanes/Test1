<?php
 class intersecto
 {
   public $vector_pivote;
   public $hora_inicio;
   public $hora_fin;
   public $vector_comparar;
   public $vector_inter;
   public $porciones;
   public $dia_sem;
   
  public function __construct($pivote,$inicio,$fin)
   {
     $this->vector_pivote=$pivote;
     $this->hora_inicio=$inicio;
     $this->hora_fin=$fin;
     
   }
   
   public function sacar_dia_sem($fecha)
   {
      $i1= date("w", strtotime($fecha));
      switch ($i1) 
          {
             case 0:
                   $this->dia_sem='DOMINGO';
                   break;
             case 1:
                   $this->dia_sem='LUNES';
                   break;
             case 2:
                   $this->dia_sem='MARTES';
                   break;
             case 3:
                   $this->dia_sem='MIERCOLES';
                   break;
             case 4:
                   $this->dia_sem='JUEVES';
                   break;
             case 5:
                   $this->dia_sem='VIERNES';
                   break;
             case 6:
                   $this->dia_sem='SABADO';
                   break;                  
                         
          } 


   }

   public function contar()
    {
        $i=$this->hora_inicio;

        while($i != $this->hora_fin+1)
        {
           
            $this->vector_comparar=$this->vector_comparar.'-'.$i;
            if($i >= 23)
            {
              $i = 0;
            }
            else
            {
              $i++;
            }
        }
    }
    public function comparar()
     {
          $this->vector_inter =0;
          $this->porciones = explode("-", $this->vector_comparar);
          $i=0;
          while($i<sizeof($this->porciones))
          {
             if (in_array($this->porciones[$i], $this->vector_pivote)) 
             {
                //echo $this->porciones[$i];
                $this->vector_inter=$this->vector_inter+1;
             }
             $i++;
          }

     }
    public function getVectorPivote()
    {
      return $this->vector_pivote;
    }
    public function getVectorComparar()
    {
      return $this->vector_comparar;
    }
    public function getVectorInter()
    {
      return $this->vector_inter;
    }

    public function getPorciones()
    {
      return $this->porciones;
    }

    public function getDiaSem()
    {
      return $this->dia_sem;
    }
 }
?>