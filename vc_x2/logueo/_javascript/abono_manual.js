// JavaScript Document





//ingresar clientes

//sacar las facturas asociadas a cada cliente
   function facturas_asociadas(user)
   {
         $("#factura").load("importacion_segun_cliente.php?uid="+user,function(){
	          $(this).fadeIn("medium");
         }); 
   }

//

//valor asociado a fact
 function valor_asoc(user,user2){

$.get('valor_asociado_fact.php?iden='+user+'/'+user2,{
    type: 'xml'
  },
  function(xml){
	 $("#vpagar").val($(xml).find('valor').text());
	  $('#vpagar').formatCurrency();
	$('#vpagar').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	}
  );
}


//

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/insertar_clientes.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Cliente Ingresado Satisfactoriamente.')

				 {

				    $("#nombre").val('');

					$("#apellido").val('');

					$("#marca").val('');

					$("#direccion").val('');

					$("#telefono").val('');

				    $("#email").val('');

					$("#ciudad").val('');

					

				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_clientes.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}



//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_cliente.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");

	//$("#content1").fadeOut("medium");

	

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

     if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#ciudad").val()=='0' ||$("#direccion").val()=='' ||$("#telefono").val()=='' ||$("#email").val()=='' ||$("#marca").val()=='')

		{

		  alert('Los campos marcados con * son obligatorios');

		}

		else

		{

		  if(!(valEmail($("#email").val())))

		  {

		   alert('Verifique que su email este bien escrito');

		  }

		  else{

				  var form= $("#edit_cli").serialize();

				

				$.post('edit_clientes.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Cliente Exitosamente Actualizado.'){

					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	

				},{

				  

				}

				

				);

		  

		  

		  }

		}

   

   

  

  

	



}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los clientes seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('cliente_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_clientes.php',{

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

		alert('Por favor seleccione los clientes  que desea eleminar');

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

   $.ajaxSettings.cache = false;

   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

   $("#guardar").bind('click',function(){

        alert('under construction');
    

   });

   //facturar asociadas a un cliente
   $("#cliente").change(function() {
     facturas_asociadas($("#cliente").val());
	 $("#vpagar").val('');
   });
   //

 //valores asociados a una factura
     $("#factura").change(function() {
        valor_asoc($("#factura").val(),$("#cliente").val());
		
   });
 //

  ver_clientes(); 

});

 









