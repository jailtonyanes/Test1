<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud(); 

 $crud2 = new Crud();
 $crud2->setConsulta("select cliente_nombre from cliente where cliente_id ='$_GET[uid]'");
 $cliente=$crud2->seleccionar($con->getConection()); 



?>

 <!-- Clientes sin marca asignada  -->

 <h2>Filtros de búsqueda</h2>
<input type="hidden" id="cliente" name="cliente" value="<?php echo $_GET['uid'] ?>">
<fieldset style="width:1050px; margin:10px auto; padding:5px">
  <legend>Cliente: <?php echo $cliente[0]['cliente_nombre']?></legend>

		<label>Dpto:</label>
		<select id="depar" class="select_search" name="depar" onchange="javascript:sacar_municipio()">
			
			<?php
			 $crud-> setConsulta("SELECT
     departamento.`departamento_id`,departamento.`departamento_nombre`
   
FROM
    `cliente`
    INNER JOIN `programacion` 
        ON (`cliente`.`cliente_id` = `programacion`.`cliente_id`)
    INNER JOIN `departamento` 
        ON (`departamento`.`departamento_id` = `programacion`.`departamento_id`)
    INNER JOIN `municipio` 
        ON (`municipio`.`municipio_id` = `programacion`.`municipio_id`)
    INNER JOIN `sucursal` 
        ON (`sucursal`.`sucursal_id` = `programacion`.`sucursal_id`)
    INNER JOIN `empleado` 
        ON (`empleado`.`cedula` = `programacion`.`guarda_id`)
    INNER JOIN `turno` 
        ON (`turno`.`turno_id` = `programacion`.`turno_id`)
    INNER JOIN `novedad` 
        ON (`novedad`.`novedad_id` = `programacion`.`novedad_id`)
    INNER JOIN puesto ON (programacion.`puesto`=puesto.`puesto_id`) where cliente.cliente_id ='$_GET[uid]'
    GROUP BY departamento.`departamento_id`      
         ORDER BY departamento.`departamento_nombre` ASC");
               $datos2= $crud->seleccionar($con->getConection()); 
               
               $i= 0;

                
?>
               <option value="" selected="selected">Escoja Opci&oacute;n</option>

<?php
               while($i<sizeof($datos2)){
                   ?>
                    <option value="<?php echo $datos2[$i]['departamento_id'] ?>"><?php echo $datos2[$i]['departamento_nombre'] ?></option>               
                   <?php


                $i++;

               }  

                   
        

  


  
?>
		</select>
		<label>Municipio:</label>
		<select id="muni" class="select_search" name="muni" onchange="javascript:sacar_suc_asoc()">
		  <option selected="selected" value=""> Escoja opción</option>
		</select>
		<label>Sucursal:</label>
		<select id="sucur" class="select_search" name="sucur" onchange="javascript:sacar_puesto_asoc()">
			<option selected="selected" value=""> Escoja opción</option>
		
		</select>
		<label>Puesto:</label>
		<select id="puest" class="select_search" name="puest">
			<option selected="selected" value=""> Escoja opción</option>
			
		</select>

  <label> Desde:
      <input name="desde" id="desde" type="text" class="ancho_filtro" readonly="readonly">
      </input>
        <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "desde",

                          dateFormat: "%Y/%m/%d",

                          trigger: "desde",

                          bottomBar: false,

                          onSelect: function() {

                                 // var date = Calendar.intToDatpe(this.selection.get());

                                 // LEFT_CAL.args.min = date;

                                //  LEFT_CAL.redraw();

                                  this.hide();
                  
                          }
                  });
                </script>
    </label>
  
  
  <label> Hasta:
      <input name="hasta" id="hasta" type="text" class="ancho_filtro" readonly="readonly">
      </input>
        <script type="text/javascript">

                  RANGE_CAL_1 = new Calendar({

                          inputField: "hasta",

                          dateFormat: "%Y/%m/%d",

                          trigger: "hasta",

                          bottomBar: false,

                          onSelect: function() {

                                 // var date = Calendar.intToDate(this.selection.get());

                                 // LEFT_CAL.args.min = date;

                                //  LEFT_CAL.redraw();

                                  this.hide();
                  
                          }
                  });
                </script>
    </label>
  
  
		<input id="search" type="button" onclick="javascript:llamada()" name="search" value="Buscar">
</fieldset>

    

