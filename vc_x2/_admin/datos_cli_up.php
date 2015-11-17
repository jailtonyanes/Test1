<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 
 session_start();
 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  
   // header("Cache-Control: no-cache, must-revalidate"); 

?>

  <?php

   //concat(cliente_apellido,' ',cliente_nombre) as nombres

   $crud->setConsulta("SELECT usuario_id,usuario_nombre,usuario_apellido,usuario_password,usuario_nick,usuario_tipo,usuario_active

FROM usuario WHERE usuario_id='$_GET[uid]'");

   $datos1 = $crud->seleccionar($con->getConection());

   $i=0;
 


  ?>


  <div id="datos">
       <h2 style="margin-top:5px">Novedades</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" class="ancho" />
  <p>
    <label>Guarda:
      <input name="guarda" id="guarda" type="text" class="ancho" value="<?php echo $datos2[0]['guarda'] ?>">
      </input>
    </label>
  
  </p>

<!--  <p>
    
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
  
 </p> -->
 
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


 
 <div id="botonera2">
  <p>
    
      <input type="button" name="editar" id="editar" value="Editar" onclick="javascript:modificar_clientes()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola()" />
    
  </p>
  </div>
  </div>
 