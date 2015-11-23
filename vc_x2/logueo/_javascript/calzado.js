// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#calzado").serialize();

  $.post('../_admin/insertar_calzado.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Calzado Ingresado Satisfactoriamente.')

				 {

				    $("#marca").val('');

					$("#costo").val('');

					

				 }

		}

	);

   

}



//ver clientes

function ver_calzado(){

 $("#view_cal").load("sacar_calzado.php",function(){

     

	$(this).fadeIn("medium");
	$('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });

  }

  );

}



//ver cliente individual

function editar_calzado(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cal").load("datos_calzado.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");
    $('#precio').formatCurrency();
	$('#precio').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	//$("#content1").fadeOut("medium");

	

  }

  );

}



//cerrar la ventana de clientes

function hola()

{

	$("#edit_cal").fadeOut("medium");

}

//editar clientes

function modificar_calzado(){

    

	 if($("#marca").val()==''||$("#precio").val()=='')

	  {

	    alert('Los campos marcados con * son obligatorios');

	  }

	  else

	  {

				 var form= $("#edit_cal").serialize();

		   

			$.post('edit_calzado.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Calzado Exitosamente Actualizado.'){
                      $("#edit_cal").fadeOut("medium");
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

	 if($("#view_cal input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los items seleccionados?') )

		{   

			var users = '';

			var arr = $("#view_cal input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('calzadoc_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_calzado.php',{

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

	

     if($("#view_cal input[type=checkbox]:checked").length >= 1)

	 {	

		var users = '';

		

		var arr = $("#view_cal input[type=checkbox]:checked");

				

		arr = jQuery.map(arr, function(n, i){

			return ('calzadoc_id=' + n.value);

		});

					

		users = arr.join(" or ");

		

		$.post('update_calzado.php',{

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

      if($("#marca").val()==''||$("#costo").val()=='')

	  {

	    alert('Los campos marcados con * son obligatorios');

	  }

	  else

	  {

	     ingresar_clientes();

	  }

  });

   

 

  ver_calzado(); 

});

 









