<div id="main_menu"> <a href="#"><img src="../_images/cartera.png" alt="Cartera" /></a>
  <div id="controlc" style="width:120px;">
    <h1>Control de Turnos de Vigilancia</h1>
  </div>
  <div id="welcome">  
    <p>Bienvenido(a) <?php echo htmlentities($_SESSION['nombre'].' '.$_SESSION['apellido']) ?><a href="destroy.php"> Terminar sesi&oacute;n</a></p> 
   </div> 
  <div id="options">
    <ul class="menu">
      <?php
	    if($_SESSION['tipo']=='1')
	    {
	  ?>
       <li> <a  href="#"> Usuarios </a>
        <ul>
          <li> <a href="crear_usuarios.php">Crear Usuarios</a> </li>
          <li> <a href="ver_usuarios.php">Ver Usuarios</a> </li>
        </ul>
      </li>
          

      <li> <a  href="#"> Turnos </a>
        <ul>
          <li> <a href="crear_turnos.php">Crear Turnos</a> </li>
          <li> <a href="ver_turnos.php">Ver Turnos</a> </li>
          <!-- <li> <a href="analizar_turnos.php">Analizar Turnos</a> </li>
           -->
        </ul>
      </li>

       <li> <a  href="#">  Empleado </a>
        <ul>
          <li> <a href="crear_empleados.php">Crear Empleados</a> </li>
          <li> <a href="ver_empleado.php">Ver Empleados</a> </li>
        </ul>
      </li>
      
         <li> <a  href="#"> Cliente </a>
        <ul>
          <li> <a href="crear_clientes.php">Crear Clientes</a> </li>
          <li> <a href="ver_cliente.php">Ver Clientes</a> </li>
        </ul>
      </li>
         <li> <a  href="#"> Departamentos </a>
        <ul>
          <li> <a href="crear_departamentos.php">Crear Departamentos</a> </li>
          <li> <a href="ver_departamentos.php">Ver Departamentos</a> </li>
        </ul>
      </li>

      <li> <a  href="#"> Municipios </a>
        <ul>
          <li> <a href="crear_municipio.php">Crear Municipios</a> </li>
          <li> <a href="ver_municipios.php">Ver Municipios</a> </li>
        </ul>
      </li>



       <li> <a  href="#"> Sucursal </a>
        <ul>
          <li> <a href="crear_sucursal.php">Crear Sucursal</a> </li>
          <li> <a href="ver_sucursal.php">Ver Sucursal</a> </li>
        </ul>
      </li>
      <li> <a  href="#"> Puestos</a>
        <ul>
          <li> <a href="crear_puesto.php">Crear Puestos</a> </li>
          <li> <a href="ver_puesto.php">Ver Puestos</a> </li>
        </ul>
      </li>

      <li> <a  href="#"> Programaci&oacute;n</a>
        <ul>
          <li> <a href="crear_asignaciones.php">Turno Fijo</a> </li>
          <li> <a href="crear_asignaciones_relevo.php">Relevantes</a> </li>
          <li> <a href="ver_asignaciones.php">Ver Asignaciones General</a> </li>
          <li> <a href="ver_planillas.php">Ver Palnillas </a> </li>

        </ul>
      </li>
       <li> <a  href="#"> Liquidación </a>
        <ul>
    <!--      <li> <a href="crear_novedades.php">Crear Novedades</a> </li>
          <li> <a href="ver_novedades.php">Ver Novedades</a> </li> !-->
           <li> <a href="liquiturnos.php">Turnos</a> </li>
           <li> <a href="nomina.php">Nómina</a> </li>
           
                 <li> <a href="crear_festivos.php">Ingresar días festivos</a> </li>
          <li> <a href="crear_minimo.php">Valor salario mínimo</a> </li>

        </ul>
      </li>
      <?php
		}
	  ?>    
            
    </ul>
  </div>
</div>
