<?php
 include('../_include/configuration.php');
 include('../_classes/conectar.php');
 include('../_classes/crud.php'); 

 session_start();

 $con = new Coneccion($server,$user,$password,$dbname);
 $con->conectar();
 $crud = new Crud();  



?>

 <!-- Clientes sin marca asignada  -->

 <h2>Filtros de búsqueda</h2>

<fieldset style="width:800px; margin:10px auto; padding:5px">

		<label>Dpto:</label>
		<select id="fecha_b" class="select_search" name="fecha_b">
			<option selected="selected" value=""> Escoja opción</option>
			<option value="2014">2014 </option>
			<option value="2015">2015 </option>
		</select>
		<label>Municipio:</label>
		<select id="fecha_b" class="select_search" name="fecha_b">
			<option selected="selected" value=""> Escoja opción</option>
			<option value="2014">2014 </option>
			<option value="2015">2015 </option>
		</select>
		<label>Sucursal:</label>
		<select id="fecha_b" class="select_search" name="fecha_b">
			<option selected="selected" value=""> Escoja opción</option>
			<option value="2014">2014 </option>
			<option value="2015">2015 </option>
		</select>
		<label>Puesto:</label>
		<select id="fecha_b" class="select_search" name="fecha_b">
			<option selected="selected" value=""> Escoja opción</option>
			<option value="2014">2014 </option>
			<option value="2015">2015 </option>
		</select>
		<input id="search" type="button" onclick="javascript:ver_clientes()" name="search" value="Buscar">
</fieldset>

    

