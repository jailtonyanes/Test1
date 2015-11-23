// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#calzado").serialize();

  $.post('../_admin/insertar_linea.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Item Ingresado Satisfactoriamente.')

				 {

				    $("#mercancia").val('');

					

					

				 }

		}

	);

   

}



//ver clientes

function ver_calzado(){

 $("#view_mer").load("sacar_linea.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}



//ver cliente individual

function editar_calzado(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_mer").load("datos_linea.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");

	//$("#content1").fadeOut("medium");

	

  }

  );

}



//cerrar la ventana de clientes

function hola()

{

	$("#edit_mer").fadeOut("medium");

}

//editar clientes

function modificar_calzado(){

   

    if( $("#mercancia").val()=='')

	   {

	    alert('Los campos marcados con * son oblgatorios');

	   }

	   else

	   {

				 var form= $("#edit_mer").serialize();

		   

			$.post('edit_linea.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Item Exitosamente Actualizado.'){
                       $("#edit_mer").fadeOut("medium");
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

	 if($("#view_mer input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los items seleccionados?') )

		{   

			var users = '';

			var arr = $("#view_mer input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('mercancia_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_linea.php',{

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

	

     if($("#view_mer input[type=checkbox]:checked").length >= 1)

	 {	

		var users = '';

		

		var arr = $("#view_mer input[type=checkbox]:checked");

				

		arr = jQuery.map(arr, function(n, i){

			return ('mercancia_id=' + n.value);

		});

					

		users = arr.join(" or ");

		

		$.post('update_linea.php',{

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

      if( $("#mercancia").val()=='')

	   {

	    alert('Los campos marcados con * son oblgatorios');

	   }

	   else

	   {

	    ingresar_clientes();

	   }

	 

	 

         

  });

   

 

  ver_calzado(); 

});

 









