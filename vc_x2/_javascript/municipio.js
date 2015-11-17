// JavaScript Document
function update_municipio(){

  
				  var form= $("#edit_cli").serialize();
				$.post('update_municipio.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Municipio Actualizado con exito.'){
					   ver_clientes();
					    location.reload();
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

function sacar_municipio2(){
 
        $("#select_municipio").load("saca_mun_emergente.php?uid="+$("#dep").val(),function(){
		      $(this).fadeIn("medium");
        });
  
  
        

}


//ingresar clientes

function ingresar_clientes(){

 var form= $("#sub").serialize();
  $("#guardar").val('Guardando...');
  $("#guardar").attr('disabled', true);
  $.post('../_admin/guarda_municipio.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Municipio Ingresado Exitosamente.')

				 {
				  
				   $("#guardar").val('Guardar Municipio');
                   $("#guardar").attr('disabled', false);  
     	          $("#sub")[0].reset(); 
				
				 }

		}

	);

   

}
 


//ver clientes

function ver_clientes(){
		dep = $("#dep").val();
	mun = $("#select_municipio").val();
	     $("#search").val('Buscando...');
  $("#search").attr('disabled', true);

 $("#view_cli").load("sacar_municipios.php?dep="+dep+"&mun="+mun,function(){

     

	$(this).fadeIn("medium");
	     $("#search").val('Buscar');
  $("#search").attr('disabled', false);

  }

  );

}


//sacar subcategorias

function subcategorias(){
  var valor=$("#categoria_id").val();

 $("#sub_categoria_id").load("sacar_subcategoria.php?uid="+valor,function(){

     

	$(this).fadeIn("medium");

  }

  );


}




//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_municipio.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");

	//$("#content1").fadeOut("medium");

	    //convirtiendo los valores a moneda      
	$('#precio').formatCurrency();
	$('#precio').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	/*$('#clazadob').formatCurrency(); //colocarle el currency
	$('#calzadob').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#coch').formatCurrency();
	$('#coch').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#confeccion').formatCurrency();
	$('#confeccion').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });

    $('#electro').formatCurrency();
	$('#electro').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	$('#juguete').formatCurrency();
	$('#juguete').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#tela').formatCurrency();
	$('#tela').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });*/
  }

  );

 

}







//cerrar la ventana de clientes

function hola()

{

	$("#edit_cli").fadeOut("medium");

}

//editar clientes

function modificar_clientes(){

     if($("#encuesta").val()=='0'  )

		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
				  var form= $("#edit_cli").serialize();
				$.post('edit_clientes.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Subcategoria Exitosamente Actualizada.'){
					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				}
				);
		}

   

   

  

  

	



}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los municipios seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('municipio_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_municipios.php',{

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

		alert('Por favor seleccione los clientes  que desea eleminar');

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
				departamento_id:{required:true},
				nombre:{required:true}
			
                
			
			
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
        $("#edit_cli").validate({
		rules: {			 
				departamento_id:{required:true},
				nombre:{required:true}
				
			
			
		},
		submitHandler: function(form) {
			//if( $('#iden').val() == ''){
				update_municipio();
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

 









