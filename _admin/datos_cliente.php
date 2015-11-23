 <?php
   include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

 $crud2= new Crud(); 
 $crud2->setConsulta("select * from cliente where cliente.cliente_id ='$_GET[uid]'");

  $datos2 = $crud2->seleccionar($con->getConection());

?>



  <div id="datos" >
       <h2 style="margin-top:5px">Editar Clientes</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" class="ancho" />
 
 <p>
    <label>*Nit:
      <input name="nit" id="nit" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_nit'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>*Nombre:
      <input name="nombre" id="nombre" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_nombre'] ?>">
      </input>
    </label>
  
  </p>
 
  <p>
    <label>*Direccion:
      <input name="direccion" id="direccion" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_direccion'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>*Tel&eacute;fono:
      <input name="telefono" id="telefono" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_telefono'] ?>">
      </input>
    </label>
  
  </p>
  <p>
  <label>*E-mail:
      <input name="email" id="email" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_email'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>P&aacute;gina Web:
      <input name="web" id="web" type="text" class="ancho" value="<?php echo $datos2[0]['cliente_web'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>*Contacto Nombre:
      <input name="c_nombre" id="c_nombre" type="text" class="ancho" value="<?php echo $datos2[0]['contacto_nombre'] ?>">
      </input>
    </label>
  
  </p>

  <p>
    <label>*Contacto Tel&eacute;fono:
      <input name="c_telefono" id="c_telefono" type="text" class="ancho" value="<?php echo $datos2[0]['contacto_telefono'] ?>">
      </input>
    </label>
  
  </p>


  <p>
    <label>*Contacto Email:
      <input name="c_email" id="c_email" type="text" class="ancho" value="<?php echo $datos2[0]['contacto_email'] ?>">
      </input>
    </label>
  
  </p>
  

 <div id="botonera2">
  <p>
    
      <input type="button" name="editar" id="editar" value="Actualizar" onclick="javascript:modificar_clientes()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola(),ver_clientes()" />
    
  </p>
  </div>
  </div>
 