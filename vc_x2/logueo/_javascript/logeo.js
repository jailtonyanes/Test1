//carga la lista de usuarios

function hacer_logueo(){
  $idvalor=document.getElementById('doc_ident').value;
  $idvalor2=document.getElementById('id_comparendo').value;
 $("#no_existe").load("verificar_identidad.php?uid="+$idvalor+"/"+$idvalor2,function(){
 	
	
	$(this).fadeIn("fast");
	
  }
  );
}

function mostrar_resultado(){
  $idvalor=document.getElementById('iden').value;
$("#informe").load('reporte.php?uid='+$idvalor,function(){
     
	$(this).fadeIn("medium");
	
	
  }
  );
}


//enviar preguntas 
function ingresar_preguntas(){
 var form= $("#preguntas").serialize();
  $.post('desmarcar.php',form,
		function(data){
			 	
				 $("#preguntas").fadeOut('medium');
	             
				
		},{
		  
		}
		
	);
   
}


//


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
    $("#login").validate({
		
		submitHandler: function(form) {
							
		},
		
		debug: true
	});


$("#logearse").bind('click',function(){
     
	   $("#login").fadeOut("medium");
	    hacer_logueo();
	 
         
  }); 

});



//pendiente: eliminar y listo



