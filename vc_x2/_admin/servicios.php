<?php
   session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/servicios.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Servicio De Taxi</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
 <script type="text/javascript">
 function validarnum(e) { // 1
	tecla = (document.all) ? e.keyCode : e.which; // 2

	if (tecla==0) return true; // 3
	if (tecla==8) return true;
 	patron = /[0123456789]/; 

	te = String.fromCharCode(tecla); // 5
	return patron.test(te); // 6
}
</script>
</head>

<body>

<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu.php');
    ?>
 <div id="content">  
<h2 class="datos_cli">Datos del Servicio</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Destino:
      <select name="destino" id="destino" class="ancho">
        <option value="0">Escoja Opci&oacute;n</option>
        <option value="1">Barranquilla</option>
        <option value="2">Soledad</option>
        <option value="3">Pueblos</option>
      
      </select>
    </label>
    
  </p>
 <p id="ub" style="display:none">
    <label>* Ubicar por:
      <select name="ubicar" id="ubicar" class="ancho">
        <option value="0">Escoja Opci&oacute;n</option>
        <option value="1" class="barrio">Barrio</option>
      <!--  <option value="2" class="direccion">Direcci&oacute;n</option> !-->
        <option value="3" class="pueblo">Pueblo</option>
      
      </select>
    </label> 
    
  </p>
  
     <p id="nbarrio"  style="display:none">
    <label>* Nombre del barrio/pueblo:
        <select name="nombarrio" id="nombarrio" class="ancho">

       </select>
    </label>
  </p>
   <p>
  <label>* Direcci&oacute;n:
      <input type="text"  class="ancho" id="dir" name="dir">
    </label>
    </p> 
 <!--  <p>
  <label>* Direcci&oacute;n:
      <input type="text"  class="ancho" id="dir" name="dir">
    </label>
    </p>
   
   <p id="pueblon" style="display:none;">
    <label>* Nombre del pueblo:
      <select name="field" id="field" class="ancho">
        <option value="0" selected="selected">Escoja Opci&oacute;n</option>
        <?php 
         $qmovil="select pueblo_id,pueblo_nombre,pueblo_precio from pueblo order by pueblo_nombre asc";
		 $rmovil=mysql_query($qmovil,$connection);
		 $nrmovil=mysql_num_rows($rmovil);
		 if($nrmovil>0)
		  {
		    while($rowmovil=mysql_fetch_array($rmovil))
			 {
		  ?>
              <option value="<?php echo $rowmovil['pueblo_id'] ?>" ><?php echo $rowmovil['pueblo_nombre'] ?></option>
		  <?php  
			 }
		  }
		  else
		  {
		 ?>
            <option value="0">No hay pueblos disponibles</option>
		<?php  
		  }
		?>
	  
       
       
      </select>
    </label>
  </p>!-->
   <p id="call1" style="display:none">
    <label>* Inicio de direcci&oacute;n:
      <select name="call" id="call" class="ancho">
        <option value="0">Escoja Opci&oacute;n</option>
        <option value="1" >Calle/Carrera/No.</option>
        <option value="2" >Calle/Diag/No.</option>
          <option value="3" >Carrera/Calle/No.</option>
        <option value="4" >Carrera/Diag/No.</option>
          <option value="5" >Diag/Calle/No.</option>
        <option value="6" >Diag/carrera/No.</option>
      </select>
    </label>
    
  </p>
 
  <p id="udt" style="display:none; padding-right:160px;" >
    
      <input name="uno" type="text" id="uno" size="1"  />
      <label>#</label>
      <input name="dos" type="text" id="dos" size="1"  />
      <label>-</label>
      <input name="tres" type="text" id="tres" size="1"  />
    
  </p> 
 
  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Enviar"  class="guarda"/>
    </label>
  </p>
  
  <div id="serv_tax" style="display:none;">
    
  </div>
</form>


</div>
</div>
</body>
</html>