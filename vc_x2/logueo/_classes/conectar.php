<?php
 class Coneccion
 {
   public $server;
   public $user;
   public $password;
   public $database;
   public $connection;

   public function conectar()
    {
      $this-> connection = mysql_connect($this->server, $this->user,$this->password);
	  mysql_select_db($this->database);
	}
	
	public function desconectar()
	 {
	   mysql_close($this->connection);
	 }
   
   public function __construct($server1,$user1,$password1,$database1)
   {
     $this->server=$server1;
	 $this->user=$user1;
	 $this->password=$password1;
	 $this->database=$database1;
   }
   
	 public function getConection()
	  {
	    return $this->connection;
	  }
    
	//el setter de conecion
	/* public function setConection($connection1)
	  {
        $this->connection = $connection1;
       }
   */
 }
?>