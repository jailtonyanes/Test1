// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/asociar_marca.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Marca Asignada Exitosamente.')

				 {
				    $("#marca").val('');
				 }

		}

	);

   

}




$(document).ready(function(){
   $.ajaxSettings.cache = false;
   $("#guardar").bind('click',function(){
        if($("#marca").val()=='' && $("#cliente").val()=='0')
		{
		  alert('Verifique que haya escrito una marca y que haya escogido un cliente');
		}
		else
		{
		  ingresar_clientes();
		}
  });
});

 









