//carga la lista de usuarios

function cargar_lista(){
 $("#lista_de_usuarios").load("ver_usuarios.php",function(){
     
	$(this).fadeIn("medium");
  }
  );
}




//cargar los autores destino de cada lección





//hace que el formulario aparezca

//alistar los campos para agregar usuarios
function agregar(){

 $("#iden").val('');
 $("#nombres").val('');
 $("#apellidos").val('');
 $("#doc_ident").val('');
 $("#tipo_documento").val('');
 $("#comp_num").val('');
 $("#enviar").val('Enviar');
 $("#usuarios").show('medium');
} 

//envía los datos via post cuando se van a ingresar
function ingresar_datos(){
 var form= $("#usuarios").serialize();
  $.post('insertar_usuarios.php',form,
		function(data){
			 	
				 $("#usuarios").hide('medium');
	             cargar_lista();
				
		}
	);
   
}

//busca los datos en el .php y los transforma en xml para luego editarlos
function edit_user(user){
  $("#iden").val(user);
   $("#enviar").val('Editar');
  $.get('informacion_usuario.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#nombres").val($(xml).find('nombre').text());
	 $("#apellidos").val($(xml).find('apellido').text());
	 $("#doc_ident").val($(xml).find('cedula').text());
	 $("#tipo_documento").val($(xml).find('tipo_doc').text());
	 $("#comp_num").val($(xml).find('comparendo').text());
	 $("#usuarios").show('medium');

	}
  );
}

//envia los datos mediante post para que se actualizen
function user_edit_submit(user){
	var form = $("#usuarios").serialize();
	    $.post('editar_usuario.php',form,
		function(data){
     	        $("#usuarios").hide('medium');
	            cargar_lista();
			}
	);
  		
}


//activa y desactiva a los usuarios los usuarios
function activate(set){
	var users = '';
	
	var arr = $("#lista_de_usuarios input[type=checkbox]:checked");
			
	arr = jQuery.map(arr, function(n, i){
		return ('persona_id=' + n.value);
	});
				
	users = arr.join(" or ");
	
	$.post('activate.php',{
			condition: users,
			value: set
		},
		function(data){
			
				cargar_lista();
			
		}
	);
}


//elimina a los usuarios

function delete_users()
{
	 if($("#lista_de_usuarios input[type=checkbox]:checked").length >= 1)
	 {
		
		if( confirm('¿Desea eliminar a los usuarios seleccionados?') )
		{   
			var users = '';
			var arr = $("#lista_de_usuarios input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('persona_id=' + n.value);
			});
			users = arr.join(" or ");
			
			$.post('eliminar_usuarios.php',{
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
		alert('Por favor seleccione los usuarios que desea eleminar');
	}
	 
	
}







//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
   $("#usuarios").validate({
		rules: {			 
			nombres:{required:true},
			apellidos:{required:true},
			doc_ident: { required: true,number:true },
			comp_num:{required: true, number:true}
			
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
     activate(0);
  });
  $("#activar").bind('click',function(){
     activate(1);
   });

$("#cancelar").bind('click',function(){
     $("#usuarios").hide('medium');
         
  });
cargar_lista(); 	 
});
 
//pendiente: eliminar y listo



