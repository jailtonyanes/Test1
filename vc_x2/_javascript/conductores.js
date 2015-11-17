// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/insertar_conductor.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Conductor Ingresado Satisfactoriamente.')

				 {
				    $("#nombre").val('');
     	            $("#apellido").val('');
                    $("#movil").val('');
                    $("#telefono").val('');
                    $("#direccion").val('');
					$("#placa").val('');
                    $("#licencia").val('');
				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_conductores.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}



//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_conductor.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");


  }

  );

 

}







//cerrar la ventana de clientes

function hola()

{

	$("#edit_cli").fadeOut("medium");

}

//editar clientes

function modificar_clientes(){

    if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#movil").val()=='0' ||$("#telefono").val()=='' ||$("#direccion").val()=='' ||$("#placa").val()=='' || $("#licencia").val()=='')
		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
			  var form= $("#edit_cli").serialize();
			  $.post('edit_conductor.php',form,
			  function(data){
  			   alert(data);
					if(jQuery.trim(data)=='Conductor Exitosamente Actualizado.'){
					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				}
				);
		}
}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los conductores seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('conductor_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_conductores.php',{

					condition: users

				},

				function(data){

						ver_clientes();

				}

			);

		}

	}

	else

	{

		alert('Por favor seleccione los conductores  que desea eleminar');

	}

	

	 

	

}



//activar,desactivar clientes

function activate_cliente(set){

	

     if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {	

		var users = '';

		

		var arr = $("#datos_cli input[type=checkbox]:checked");

				

		arr = jQuery.map(arr, function(n, i){

			return ('cliente_id=' + n.value);

		});

					

		users = arr.join(" or ");

		

		$.post('update_clientes.php',{

				condition: users,

				value: set

			},

			function(data){

				

					ver_clientes();

				

			}

		);

	 }

	 else

	 {

	  alert('Seleccione los clientes que desea activar o desactivar');

	 }

}



  function valEmail(valor){

         re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/

            if(!re.exec(valor))    {

              return false;

           }

		   else

		   {

            return true;

           }

        }



//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

  // $.ajaxSettings.cache = false;

   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

   $("#guardar").bind('click',function(){
	   if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#movil").val()=='0' ||$("#telefono").val()=='' ||$("#direccion").val()=='' ||$("#placa").val()=='' || $("#licencia").val()=='')
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
		  ingresar_clientes();
		}
  });

      

   $("#destino").change(function()
   {
     if($("#destino").val()=='1' || $("#destino").val()=='2' )
	  {
	    $(".pueblo").fadeOut('medium');
		$(".barrio").fadeIn('medium');
		$(".direccion").fadeIn('medium');
	  }
	  else
	  {
	    $(".pueblo").fadeIn('medium');
		$(".barrio").fadeOut('medium');
		$(".direccion").fadeOut('medium');
	  }
     
   });

   $("#ubicar").change(function()
   {
     if($("#ubicar").val()=='1' )
	  {
	    $("#nbarrio").fadeIn('medium');
		$("#call1").fadeOut('medium');
	  }
	  else
	  {
	      $("#nbarrio").fadeOut('medium');
		  $("#call1").fadeIn('medium');
	  }
     
   });



 

  ver_clientes(); 

});

 









