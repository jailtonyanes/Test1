//carga la lista de usuarios

function cargar_lista(){
 $("#lista_de_preguntas").load("ver_preguntas.php",function(){
     
	$(this).fadeIn("medium");
  }
  );
}




//cargar los autores destino de cada lección





//hace que el formulario aparezca

//alistar los campos para agregar usuarios
function agregar(){

 $("#iden").val('');
 $("#pregunta").val('');
 $("#respuesta").val('');
 $("#respuesta1").val('');
 $("#respuesta2").val('');
 $("#respuesta3").val('');
 $("#curso_id").val('');
 $("#enviar").val('Asignar');
 $("#preguntas").fadeIn('medium');
} 

//envía los datos via post cuando se van a ingresar
function ingresar_datos(){
 var form= $("#preguntas").serialize();
  $.post('insertar_preguntas.php',form,
		function(data){
			 	
				  $("#pregunta").val('');
                  $("#respuesta").val('');
				  $("#respuesta1").val('');
				  $("#respuesta2").val('');
                  $("#respuesta3").val('');
                  $("#curso_id").val('');
	             cargar_lista();
				
		}
	);
   
}

//busca los datos en el .php y los transforma en xml para luego editarlos
function edit_pregunta(user){
  $("#iden").val(user);
   $("#enviar").val('Editar');
  $.get('informacion_pregunta.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#pregunta").val($(xml).find('pregunta').text());
	 $("#respuesta").val($(xml).find('respuesta').text());
	 $("#respuesta1").val($(xml).find('respuesta1').text());
	 $("#respuesta2").val($(xml).find('respuesta2').text());
	 $("#respuesta3").val($(xml).find('respuesta3').text());
	 $("#curso_id").val($(xml).find('curso').text());
	 $("#preguntas").show('medium');

	}
  );
}

//envia los datos mediante post para que se actualizen
function user_edit_submit(user){
	var form = $("#preguntas").serialize();
	    $.post('editar_pregunta.php',form,
		function(data){
     	        $("#preguntas").hide('medium');
	            cargar_lista();
			}
	);
  		
}


//activa y desactiva a los usuarios los usuarios
function activate_preguntas(set){
	var users = '';
	
	var arr = $("#lista_de_preguntas input[type=checkbox]:checked");
			
	arr = jQuery.map(arr, function(n, i){
		return ('pregunta_id=' + n.value);
	});
				
	users = arr.join(" or ");
	
	$.post('activate_preguntas.php',{
			condition: users,
			value: set
		},
		function(data){
			
				cargar_lista();
			
		}
	);
}


//eliminar las respuestas

function delete_users()
{
	 if($("#lista_de_preguntas input[type=checkbox]:checked").length >= 1)
	 {
		
		if( confirm('¿Desea eliminar las preguntas seleccionadas?') )
		{   
			var users = '';
			var arr = $("#lista_de_preguntas input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('pregunta_id=' + n.value);
			});
			users = arr.join(" or ");
			
			$.post('eliminar_preguntas.php',{
					condition: users
				},
				function(data){
						cargar_lista();
				}
			);
		}
	}
	else
	{
		alert('Por favor seleccione las preguntas que desea eleminar');
	}
	
	 
	
}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
   $("#preguntas").validate({
		rules: {			 
			respuesta:{required:true},
			pregunta:{required:true},
                  respuesta1:{required:true},
                  respuesta2:{required:true},
                  respuesta3:{required:true}
			
			
		},
		submitHandler: function(form) {
			if( $('#iden').val() == ''){
				ingresar_datos();
			}
			else
			{
				user_edit_submit();
			}
		},
		errorElement: 'span',
		debug: true
	});
   

   
  //manejar las listas
  $("#agregar").bind('click',agregar);
  $("#eliminar").bind('click',delete_users);
 $("#desactivar").bind('click',function(){
     activate_preguntas(0);
  });
  $("#activar").bind('click',function(){
     activate_preguntas(1);
   });

$("#cancelar").bind('click',function(){
     $("#preguntas").hide('medium');
         
  });
cargar_lista(); 	 
});
 
//pendiente: eliminar y listo



