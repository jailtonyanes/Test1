// JavaScript Document


function update_users(){

  
				  var form= $("#edit_cli").serialize();
				$.post('update_cli.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Usuario Actualizado con exito.'){
					   location.reload();
					   ver_clientes();
					    
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				}
				);
	

   

   

  

  

	



}


 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }


//ingresar clientes

function ingresar_clientes(){

 var form= $("#sub").serialize();

  $.post('../_admin/insertar_usuarios.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Usuario Ingresado Exitosamente.')

				 {
				    $("#sub")[0].reset();
     	           
     	        
				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

  nombre= $("#nombre").val();
  tipo_usuario= $("#tipo_usuario").val();
  estado= $("#estado").val();
    $("#search").val('Buscando...');
  $("#search").attr('disabled', true);
 $("#view_cli").load("sacar_usuarios.php?nombre="+nombre+"&tipo_usuario="+tipo_usuario+"&estado="+estado,function(){

     

	$(this).fadeIn("medium");
     $("#search").val('Buscar');
  $("#search").attr('disabled', false);
  }

  );

}



//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_usuario.php?uid="+$idvalor,function(){

     

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

function modificar_clientes()
{
    if($("#nombre").val()=='' || $("#apellido").val()=='' || $("#nick").val()=='' || $("#password").val()=='' ||$("#tipo_usuario").val()=='' ||$("#estado_usuario").val()=='' )
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
				  var form= $("#edit_cli").serialize();
				$.post('edit_usuarios.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Usuario Exitosamente Actualizado.'){
					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				});

		}
}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los usuarios seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('usuario_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_usuarios.php',{

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

		alert('Por favor seleccione las categorias  que desea eleminar');

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



   
  $("#sub").validate({
		rules: {			 
				nombre:{required:true},
				apellido:{required:true},
                password:{required:true},
                nick:{required:true},
                tipo_usuario:{required:true},
                estado_usuario:{required:true}
                
			
			
		},
		submitHandler: function(form) {
			//if( $('#iden').val() == ''){
				ingresar_clientes();
			//}
			//else
			//{
			//	user_edit_submit();
			//}
		},
		errorElement: 'span',
		debug: true
	});

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

  

      

   $("#tipo").change(function() {

      $("#idenl").val( $("#tipo").val());

	   if($("#idenl").val()==13)

	   {

	     $("#cubicajel").fadeOut("medium");

		 $("#paresl").fadeIn("medium");

		 $("#marcal").fadeIn("medium");

	     $("#preciol").fadeIn("medium");

	   }

	   else

	   {

	     $("#cubicajel").fadeIn("medium");

		   $("#marcal").fadeOut("medium");

		   $("#paresl").fadeOut("medium");

		   $("#preciol").fadeOut("medium");

	   }

	  

	 /*if($("#tipo").val()=="1")

	  {

	   $("#cubicaje").fadeIn("medium");

	  }

	  else

	  {

	     $("#cubicaje").fadeOut("medium");

	  }*/

    

   });

  


 

  ver_clientes(); 

});

 









