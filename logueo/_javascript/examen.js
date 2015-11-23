//redireccionar a otra página
function enviar(pagina){
document.choose.action = pagina;
document.choose.submit();

}


//carga la lista de usuarios

function cargar_lista(){
 $("#content").load("preguntas.php",function(){
     
	$(this).fadeIn("medium");
	$("#content1").fadeOut("medium");
	
  }
  );
}

//en esta parte se escojen las preguntas del curso que la persona elijió
function cargar_preguntas(){
 $('#choose').fadeOut("medium");

  $idvalor=document.getElementById('esco_examen').value;
 $("#preguntas").load("cargar_preguntas.php?uid="+$idvalor,function(){
     $("#cedula2").val($("#cedula").val()); 
	 $("#comparendo2").val($("#comparendo").val()); 
	$(this).fadeIn("medium");
	//$("#content1").fadeOut("medium");
	
  }
  );
}

//cargar el flash
function cargar_flash(){
  var a;
  a=document.getElementById('esco_examen').value;
  $.get('buscar_carpeta.php?iden='+a,{
    type: 'xml'
  },
  function(xml){
	   if($(xml).find('carpeta').text()== '')
	    {
	      alert('Curso  no disponible');
		}
		else
		{
		 $("#folder").val($(xml).find('carpeta').text());
		 enviar('_descompresed/'+$("#folder").val());
		}
	 }
  );

}


//funcion comenzar de nuevo
function comenzar_de_nuevo(){
  $("#informe").fadeOut("medium");
  cargar_preguntas();
}



function mostrar_resultado(){
 $("#informe").load("reporte.php",function(){
     
	$(this).fadeIn("medium");
	
	
  }
  );
}



//enviar preguntas 
function ingresar_preguntas(){
 var form= $("#preguntas").serialize();
  $.post('calificar.php',form,
		function(data){
			 	
				 $("#preguntas").fadeOut('medium');
	             
				
		},{
		  
		}
		
	);
   
}


//


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
    $("#preguntas").validate({
		
		submitHandler: function(form) {
				ingresar_preguntas();
                mostrar_resultado();			
		},
		
		debug: true
	});
	
 //submit del formulario donde se escoge el examen y se digita el número del comparendo  

   
$("#enviar").bind('click',function(){
     
	     cargar_preguntas();
		 
  });




  

});



//pendiente: eliminar y listo

