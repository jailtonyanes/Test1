// JavaScript Document
function update_departamento(){

  
				  var form= $("#edit_cli").serialize();
				$.post('update_minimo.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Monto Actualizado con exito.'){
					   ver_clientes();
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



//ingresar clientes

function ingresar_clientes(){

 var form= $("#sub").serialize();
    $("#guardar").val('Guardando...');
  $("#guardar").attr('disabled', true);
  $.post('../_admin/guarda_tope_salario.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Monto Ingresado Exitosamente.')

				 {
				   
				    $("#fecha_b").val('');
				    ver_clientes();
     	            $("#guardar").val('Guardar Monto');
                    $("#guardar").attr('disabled', false);
                    $("#monto").val('');
                     $("#year").val('');
                    
     	          //$("#sub")[0].reset(); 
				
				 }
				 else
				 {
				 	  $("#guardar").val('Guardar Monto');
                      $("#guardar").attr('disabled', false);
				 }

		}

	);

   

}
 


//ver clientes

function ver_clientes(){
  $("#year").val(''); 
 var fecha_b=$("#fecha_b").val();

var fecha = new Date();
var y2 = fecha.getFullYear();

var filtro='';

if(fecha_b =='')
{
  filtro= y2;
}
else
{
  filtro=fecha_b;
}
 
  if(filtro != ''){
    $("#search").val('Buscando...');
  $("#search").attr('disabled', true);	
	 $("#view_cli").load("sacar_minimos.php?fecha="+filtro,function(){
	    
	                  $("#search").val('Buscar');
	                  $("#search").attr('disabled', false);
	     

		$(this).fadeIn("medium");

	  }

	  );
   }
   else
   {
   	alert('Escoga el a\u00f1o para buscar los festivos.');
   }
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



 $("#edit_cli").load("datos_minimo.php?uid="+$idvalor,function(){

     

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

		

		if( confirm('Desea eliminar el/los monto(s) seleccionado(s)?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('minimo_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_monto.php',{

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

		alert('Por favor seleccione las fechas  que desea eleminar');

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
				year:{required:true},
				monto:{required:true}
			
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
				fecha2:{required:true},
				
			
			
		},
		submitHandler: function(form) {
			//if( $('#iden').val() == ''){
				update_departamento();
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

  


 

  //ver_clientes(); 

});

 









