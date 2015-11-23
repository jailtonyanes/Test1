<div id="main_menu"> <a href="#"><img src="../_images/1317501716_Program-Group.png" alt="Cartera" /></a>
  <div id="controlc" style="width:120px;">
    <h1>Control de asistencia de BUSEXPRESS</h1>
  </div>
  <div id="welcome">  
    <p>Bienvenido(a) <?php echo htmlentities($_SESSION['nombre1'].' '.$_SESSION['apellido1']) ?><a href="destroy.php"> Terminar sesi&oacute;n</a></p> 
   </div> 
  <div id="options">
    <ul class="menu">
      <?php
	    if($_SESSION['admin_user_type']==1)
	    {
	  ?>
      <li> <a  href="#"> Categorias </a>
        <ul>
          <li> <a href="usuarios.php">Crear Categor&iacute;as</a> </li>
          <li> <a href="ver_usuarios.php">Ver Categor&iacute;as</a> </li>
        </ul>
      </li>
      
      <li> <a  href="#">Subcategor&iacute;as</a>
        <ul>
       
          <li> <a href="zona.php">Crear Subcategor&iacute;as</a> </li>
     
		
          <li> <a href="ver_zona.php">Ver Subcategor&iacute;as</a> </li>
         
        </ul>
      </li>
      
      <li> <a  href="#">Items</a>
        <ul>
       
          <li> <a href="crear_items.php">Crear Items</a> </li>
     
		
          <li> <a href="ver_items.php">Ver Items</a> </li>
         
        </ul>
      </li>
      
    
   <!--  <li> <a  href="#">Resultados</a>
        <ul>
          <li> <a href="resumen_gen.php">Ver Resultados</a> </li>
         </ul>
         
      </li> !-->
      
      <?php
		}
	  ?>    
            
    </ul>
  </div>
</div>
