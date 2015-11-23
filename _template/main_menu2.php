<div id="main_menu"> <a href="#"><img src="../_images/1317501716_Program-Group.png" alt="Cartera" /></a>
  <div id="controlc" style="width:120px;">
    <h1>Programa de vigilancia epidemiol&oacute;gica</h1>
  </div>
  <div id="welcome">  
    <p>Bienvenido(a) <?php echo htmlentities($_SESSION['admin_nombre'].' '.$_SESSION['admin_apellido'].'  ') ?><a href="#"> Barranquilla, <?php echo date('Y-m-d'); ?></a></p> 
   </div> 
  <div id="options">
    <ul class="menu">
      <?php
	    if($_SESSION['admin_user_type']==1)
	    {
	  ?>
      <li> <a  href="#"> Encuestas </a>
        <ul>
          <li> <a href="usuarios.php">Crear encuestas</a> </li>
          <li> <a href="ver_usuarios.php">Ver encuestas</a> </li>
        </ul>
      </li>
      
      <li> <a  href="#">Preguntas</a>
        <ul>
       
          <li> <a href="zona.php">Crear preguntas</a> </li>
     
		
          <li> <a href="ver_zona.php">Ver preguntas</a> </li>
         
        </ul>
      </li>
      <?php
		}
	  ?>    
            
    </ul>
  </div>
</div>
