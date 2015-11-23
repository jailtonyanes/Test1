function verificar_ingreso(id){
 $idvalor=id;

 $("#ingreso_y_n").load("ingreso_y_n.php?uid="+$idvalor,function(){
 	$(this).fadeIn("medium");
	
  }
  );
}

//envía los datos via post cuando se van a ingresar
function ingresar_datos(){
 var form= $("#usuarios").serialize();
  $idvalor=document.getElementById('doc_ident').value;
  $.post('insertar_usuarios.php',form,
		function(data){
		   $("#usuarios").fadeOut('medium');
		   verificar_ingreso($idvalor);
				 
		}
	);
   
}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
   
   $("#usuarios").validate({
		rules: {			 
			nombres:{required:true},
			apellidos:{required:true},
			doc_ident: { required: true,number:true },
			fijo:{required:true,number:true},
			celular:{required:true,number:true},
			direccion:{required:true},
			barrio:{required:true}
			
		},
		submitHandler: function(form) {
			
				ingresar_datos();
				$("#regresar").fadeIn("medium");
			
			
		},
		errorElement: 'span',
		debug: true
	});
   

   
  //manejar las listas
  
 	 
});
 
//pendiente: eliminar y listo



