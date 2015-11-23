// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#importacion").serialize();

  $.post('../_admin/insertar_importacion.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Registro Ingresado Satisfactoriamente.')

				 {

				    $("#impornum").val('');

					$("#fecha").val('');

					$("#fechalleg").val('');

					$("#fechalev").val('');

					

				 }

		}

	);

   

}



//ver clientes

function ver_calzado(){

 $("#view_impor").load("sacar_importacion.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}



//ver cliente individual

function editar_calzado(user){
$("#edit_impor").fadeIn('medium');
 $("#imporid").val(user);
$.get('datos_importacion.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#impornum").val($(xml).find('numero').text());
	 $("#fecha").val($(xml).find('fecha').text());
	 $("#fechalleg").val($(xml).find('fecha2').text());
	 $("#fechalev").val($(xml).find('fecha3').text());
	}
  );
}



//cerrar la ventana de clientes

function hola()

{

	$("#edit_impor").fadeOut("medium");

}

//editar clientes

function modificar_calzado(){



  

  

      if( $("#impornum").val()==''||$("#fecha").val()==''||$("#fechalleg").val()==''){

	    alert('Los campos marcados con * son obligatorios.');		

	 

	 }

	 else

	 {

	         var form= $("#edit_impor").serialize();

   

			$.post('edit_importacion.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Regsitro Exitosamente Actualizado.'){
                      
					   $("#edit_impor").fadeOut("medium");
					  ver_calzado();

					}	

				},{

				  

				}

				

			  );

	 }

  

  

  

	



}



//eliminar clientes

function delete_calzado()

{

	 if($("#view_impor input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los items seleccionados?') )

		{   

			var users = '';

			var arr = $("#view_impor input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('importacion_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_importacion.php',{

					condition: users

				},

				function(data){

						ver_calzado();

				}

			);

		}

	}

	else

	{

		alert('Por favor seleccione los items  que desea eleminar');

	}

	

	 

	

}



//activar,desactivar clientes

function activate_calzado(set){

	

     if($("#view_impor input[type=checkbox]:checked").length >= 1)

	 {	

		var users = '';

		

		var arr = $("#view_impor input[type=checkbox]:checked");

				

		arr = jQuery.map(arr, function(n, i){

			return ('importacion_id=' + n.value);

		});

					

		users = arr.join(" or ");

		

		$.post('update_importacion.php',{

				condition: users,

				value: set

			},

			function(data){

				

					ver_calzado();

				

			}

		);

	 }

	 else

	 {

	  alert('Seleccione los items que desea activar o desactivar');

	 }

}







//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

   $.ajaxSettings.cache = false;

  $("#guardar").bind('click',function(){

     if( $("#impornum").val()==''||$("#fecha").val()==''||$("#fechalleg").val()==''){

	    alert('Los campos marcados con * son obligatorios.');		

	 

	 }

	 else

	 {

	    ingresar_clientes();

	 }

  });

   

 

  ver_calzado(); 

});

 









