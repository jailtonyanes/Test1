//carga la lista de usuarios

function cargar_lista(){
 $("#lista_de_cursos").load("ver_cursos.php",function(){
     
	$(this).fadeIn("medium");
  }
  );
}

function agregar_cursos(){
   $("#cursos").fadeIn("medium");
}
//hace que el formulario aparezca

//alistar los campos para agregar usuarios
function agregar(){

 $("#iden").val('');
 $("#curso").val('');
  $("#enviar").val('Agregar');
 $("#cursos").show('medium');
} 


//busca los datos en el .php y los transforma en xml para luego editarlos
function edit_curso(user){

    $("#cancelar").bind('click',function(){
     alert("hola");
         
  });


}

//envia los datos mediante post para que se actualizen
function user_edit_submit(user){
	var form = $("#cursos").serialize();
	    $.post('editar_curso.php',form,
		function(data){
     	        $("#cursos").hide('medium');
	            cargar_lista();
			}
	);
  		
}


//activa y desactiva a los usuarios los usuarios
function activate_cliente(set){
	var users = '';
	
	var arr = $("#lista_de_cursos input[type=checkbox]:checked");
			
	arr = jQuery.map(arr, function(n, i){
		return ('curso_id=' + n.value);
	});
				
	users = arr.join(" or ");
	
	$.post('activate_curso.php',{
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
	 if($("#lista_de_cursos input[type=checkbox]:checked").length >= 1)
	 {
		
		if( confirm('¿Desea eliminar los cursos seleccionados') )
		{   
			var users = '';
			var arr = $("#lista_de_cursos input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('curso_id=' + n.value);
			});
			users = arr.join(" or ");
			
			$.post('eliminar_curso.php',{
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
		alert('Por favor seleccione los cursos que desea eleminar');
	}
	
	 
	
}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
   
   
  //manejar las listas
  $("#agr_cursos").bind('click',agregar_cursos);
  $("#agregar").bind('click',agregar);
  $("#eliminar").bind('click',delete_users);
 $("#desactivar").bind('click',function(){
     activate_curso(0);
  });
  $("#activar").bind('click',function(){
     activate_curso(1);
   });

$("#cancelar").bind('click',function(){
     $("#cursos").fadeOut('medium');
         
  });
 	 
});
 
//pendiente: eliminar y listo



