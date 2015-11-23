<?php
   session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
  include('../_include/configuration.php');

?>
 <?php
   include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

 $crud2= new Crud(); 
 $crud2->setConsulta("select programacion.prog_id,concat(empleado.apellido1,' ',empleado.apellido2,' ',empleado.nombre1,' 
',empleado.nombre2)
 as guarda, programacion.fecha, novedad.novedad_id,novedad.nombre,
turno.tp_jornada,programacion.novedad_horas 
 
from programacion  
join empleado on (programacion.guarda_id = empleado.cedula) 
join novedad on (programacion.novedad_id = novedad.novedad_id)
join turno on(programacion.turno_id = turno.turno_id) where programacion.prog_id ='$_GET[uid]'");

  $datos2 = $crud2->seleccionar($con->getConection());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/c_asignaciones.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<script type="text/javascript" src="../_javascript/jquery.validate.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Novedades </title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
<!-- Calendario !-->
<link type="text/css" rel="stylesheet" href="../src/css/jscal2.css" />
<link type="text/css" rel="stylesheet" href="../src/css/border-radius.css" />
<link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="../src/css/steel/steel.css" />
<script src="../src/js/jscal2.js"></script>
<script src="../src/js/unicode-letter.js"></script>
<script src="../src/js/lang/es.js"></script>
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
<!-- Fin Calendario !-->
</head>

<body>

<div id="container">
  <?php 
     include('../_template/main_menu.php');
    ?>
  <div id="content">  
  <h2 class="datos_cli">Novedades</h2>

  <form  name="sub" id="sub" method="post" enctype="multipart/form-data">
     
  
 <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid2'] ?>" class="ancho" />
  <input type="hidden" name="iden3" id="iden3" value="<?php echo $datos2[0]['tp_jornada'] ?>" class="ancho" />
 
  <p>
    <label>Guarda:
      <input name="guarda" id="guarda" type="text" class="ancho" value="<?php echo $datos2[0]['guarda'] ?>">
      </input>
    </label>
  
  </p>

 <p>
    
    <label> Novedad:
     
      <select class="ancho" id="departamento_id" name="departamento_id">
          <option selected="selected" value="">Escoja opción</option>
    
  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("select  novedad_id,nombre 
 from novedad where activo = '1' order by novedad.nombre asc");

   $datos = $crud->seleccionar($con->getConection());

   $i=0;
   while ($i<sizeof($datos))
   {   
?>
   <option <?php if($datos2[0]['novedad_id']==$datos[$i]['novedad_id']){echo 'selected=selected';} ?> value="<?php echo $datos[$i]['novedad_id'] ?>"><?php echo $datos[$i]['nombre'] ?></option>
      

<?php
    $i++;
  }
?>
      
      </select>
    </label>
  
 </p>
 
   <p>
    <label>Inicio:
      <input name="fini" id="fini" type="text" class="ancho" readonly="readonly" value="<?php echo $datos2[0]['fecha']?>">
      </input>
             <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "fini",

                          dateFormat: "%Y/%m/%d",

                          trigger: "fini",

                          bottomBar: false,

                          onSelect: function() {

                                 
                                  this.hide();
                                  calcula();
                                  ver_clientes();
                  
                          }
                  });
                </script>

    </label>
  
  </p>
    <p>
    <label>Fin:
      <input name="f_fin" id="f_fin" type="text" class="ancho" readonly="readonly" value="<?php echo $datos2[0]['fecha']?>">
      </input>
              <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "f_fin",

                          dateFormat: "%Y/%m/%d",

                          trigger: "f_fin",

                          bottomBar: false,

                          onSelect: function() {

                                 
                                  this.hide();
                                  calcula();
                                  ver_clientes();
                  
                          }
                  });
                </script>
    </label>
  
  </p>
  <p>
     <label> # Horas:
     <input  id="n_horas" name="n_horas" type="text" min="0" max="20" step="1" value="<?php echo $datos2[0]['novedad_horas'] ?>"  class="ancho" onKeyPress="return validarnum(event)">
    </label>
  </p>

 <div id="botonera2">
  <p>
    
      <input type="button" name="editar" id="editar" value="Actualizar" onclick="javascript:modificar_clientes()" />

    
  </p>
  </div>
      </form>
      </div>
 </div>    
 
  



  

 

<!-- !-->






    
 

 
 
 
  



</div>
</div>
</body>
</html>
