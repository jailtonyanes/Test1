// JavaScript Document


//ingresar clientes
function ingresar_clientes(){
 var form= $("#calzado").serialize();
  $.post('../_admin/insertar_ciudad.php',form,
		function(data){
			 	
				alert(data);
				 if(jQuery.trim(data)=='Ciudad Ingresada Satisfactoriamente.')
				 {
				    $("#ciudad").val('');
					
					
				 }
		}
	);
   
}

//ver clientes
function ver_calzado(){
 $("#view_ciu").load("sacar_ciudad.php",function(){
     
	$(this).fadeIn("medium");
  }
  );
}

//ver cliente individual
function editar_calzado(user){

 $("#iden").val(user);
 $idvalor=document.getElementById('iden').value;

 $("#edit_ciu").load("datos_ciudad.php?uid="+$idvalor,function(){
     
	$(this).fadeIn("medium");
	//$("#content1").fadeOut("medium");
	
  }
  );
}

//cerrar la ventana de clientes
function hola()
{
	$("#edit_ciu").fadeOut("medium");
}
//editar clientes
function modificar_calzado(){
   
    if($("#ciudad").val()==''){
	     alert('Los campos marcados con * son obligatorios.');
		
	  }
	  else
	  {
			 var form= $("#edit_ciu").serialize();
	   
		$.post('edit_ciudad.php',form,
			function(data){
					alert(data);
			
				if(jQuery.trim(data)=='Ciudad Exitosamente Actualizada.'){
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
	 if($("#view_ciu input[type=checkbox]:checked").length >= 1)
	 {
		
		if( confirm('Desea eliminar los items seleccionados?') )
		{   
			var users = '';
			var arr = $("#view_ciu input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('ciudad_id=' + n.value);
			});
			users = arr.join(" or ");
			
			$.post('eliminar_ciudad.php',{
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
	
     if($("#view_ciu input[type=checkbox]:checked").length >= 1)
	 {	
		var users = '';
		
		var arr = $("#view_ciu input[type=checkbox]:checked");
				
		arr = jQuery.map(arr, function(n, i){
			return ('ciudad_id=' + n.value);
		});
					
		users = arr.join(" or ");
		
		$.post('update_ciudad.php',{
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
      if($("#ciudad").val()==''){
	     alert('Los campos marcados con * son obligatorios.');
		
	  }
	  else
	  {
	     ingresar_clientes();
	  }
  });
   
 
  ver_calzado(); 
});
 




