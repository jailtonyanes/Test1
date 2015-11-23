 <?php
   include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 


 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  

 $crud2= new Crud(); 
 $crud2->setConsulta("select * from puesto where puesto_id ='$_GET[uid]'");

  $datos2 = $crud2->seleccionar($con->getConection());
  $dep = $datos2[0]['departamento_id'];
  $suc = $datos2[0]['sucursal_id'];
  $cli = $datos2[0]['cliente_id'];
  $mun = $datos2[0]['municipio_id'];


?>
  <div id="datos" >
       <h2 style="margin-top:5px">Editar Puesto</h2>
   <input type="hidden" name="iden2" id="iden2" value="<?php echo $_GET['uid'] ?>" class="ancho" />
 <p>
    <label>
      Seleccione Cliente
       <select name="select_cliente" type="text" id="select_cliente"  class="ancho">
                             
              <?php
               $crud_cliente = new Crud();
               $crud_cliente-> setConsulta("SELECT cliente_id,cliente_nombre FROM cliente ORDER BY cliente_nombre ASC");
               $datos_cliente= $crud_cliente->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos_cliente)){
                   ?>
                    <option <?php if($datos_cliente[$i]['cliente_id'] == $datos2[0]['cliente_id']){echo 'selected=selected';}  ?> value="<?php echo $datos_cliente[$i]['cliente_id'] ?>"><?php echo $datos_cliente[$i]['cliente_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                //$con->desconectar();


               ?>             
       </select>
    </label>
    </p>

  <p>
    <label>
      Seleccione Departamento
       <select name="select_dpto" type="text" id="select_dpto" onchange="javascript:sacar_municipio()" class="ancho">
              <?php
               $crud-> setConsulta("SELECT departamento_id, departamento_nombre FROM departamento  ORDER BY departamento_nombre ASC");
               $datos1= $crud->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos1)){
                   ?>
                    <option <?php if($datos1[$i]['departamento_id'] == $datos2[0]['departamento_id']){echo 'selected=selected';}  ?> value="<?php echo $datos1[$i]['departamento_id'] ?>"><?php echo $datos1[$i]['departamento_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                //$con->desconectar();


               ?>             
       </select>
    </label>
    </p>
<!--                                                                MUNICIPIO -->
  <p>
    <label>
      Seleccione Municipio
       <select name="select_municipio" type="text" id="select_municipio" onchange="sacar_sucursal()" class="ancho">
                <?php
               $crud-> setConsulta("SELECT municipio_id, municipio_nombre FROM municipio  where  municipio.departamento_id ='$dep'ORDER BY municipio_nombre ASC");
               $datos1= $crud->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos1)){
                    if($datos1[$i]['municipio_id']!='')
                     {
                   ?>
                    <option <?php if($datos1[$i]['municipio_id'] == $datos2[0]['municipio_id']){echo 'selected=selected';}  ?> value="<?php echo $datos1[$i]['municipio_id'] ?>"><?php echo $datos1[$i]['municipio_nombre'] ?></option>               
                   <?php
                      }

                $i++;

               }  

                //$con->desconectar();


               ?>           
                          
       </select>
    </label>
    </p>
<p>
    <label>
      Seleccione Sucursal
       <select name="select_sucursal" type="text" id="select_sucursal" class="ancho">
               <?php
               $crud-> setConsulta("SELECT sucursal_id, sucursal_nombre FROM sucursal  where 
                sucursal.municipio_id ='$mun' and sucursal.departamento_id = '$dep' and sucursal.cliente_id ='$cli' ORDER BY sucursal_nombre ASC");
               $datos1= $crud->seleccionar($con->getConection()); 
               
               $i= 0;

               while($i<sizeof($datos1)){
                     if($datos1[$i]['sucursal_id']!='')
                     {
                   ?>
                    <option <?php if($datos1[$i]['sucrsal_id'] == $datos2[0]['sucursal_id']){echo 'selected=selected';}  ?> value="<?php echo $datos1[$i]['sucursal_id'] ?>"><?php echo $datos1[$i]['sucursal_nombre'] ?></option>               
                   <?php
                     }

                $i++;

               }  

                //$con->desconectar();


               ?>           
                          
       </select>
    </label>
    </p>


<p>
<label>
Puesto:
<input id="puesto" class="ancho" type="text" name="puesto" value="<?php echo $datos2[0]['puesto_nombre'] ?>">
</label>
</p>
  

 <div id="botonera2">
  <p>
    
      <input type="button" name="editar" id="editar" value="Actualizar" onclick="javascript:modificar_clientes()" />
      <input type="button" name="cerrar" id="cerrar" value="Cerrar" onclick="javascript:hola(),ver_clientes()" />
    
  </p>
  </div>
  </div>
 