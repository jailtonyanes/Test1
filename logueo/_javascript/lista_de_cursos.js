//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

function edit_curso(user){
  $("#iden").val(user);
   $("#enviar").val('Editar');
  $.get('informacion_curso.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#curso").val($(xml).find('curso').text());
	
	 $("#cursos_2").show('medium');

	}
  );
}

//envia los datos mediante post para que se actualizen
function cursos_edit_submit(user){
	var form = $("#cursos_2").serialize();
	    $.post('editar_curso.php',form,
		function(data){
     	        $("#cursos_2").hide('medium');
	            cargar_lista();
			}
	);
  		
}


//activa y desactiva  los cursos 
function activate_curso(set){
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



//carga la lista de usuarios
function cargar_lista(){
 $("#lista_de_cursos").load("ver_cursos.php",function(){
     
	$(this).fadeIn("medium");
  }
  );
}

function enviar(pagina){
document.botones.action = pagina;
document.botones.submit();
}

function delete_cursos()
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




//cuerpo del jquery, aquí se ejecutan todas las funciones declaradas
$(document).ready(function(){
   
 $("#cursos_2").validate({
		rules: {			 
			curso:{required:true}
			
			
		},
		submitHandler: function(form) {
			cursos_edit_submit();
		},
		errorElement: 'span',
		debug: true
	});


//activar y desactivar a los cursos

 $("#desactivar").bind('click',function(){
     activate_curso(0);
  });
  $("#activar").bind('click',function(){
     activate_curso(1);
   });


//este es el listener de los botones
$("#cancelar").bind('click',function(){
     $("#cursos_2").hide('medium');
         
  });
$("#regresar").bind('click',function(){
     enviar('cursos.php');
         
  });
$("#eliminar").bind('click',delete_cursos);
cargar_lista();

 	 
});
 
//pendiente: eliminar y listo
