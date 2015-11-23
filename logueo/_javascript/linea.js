// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#linea").serialize();

  $.post('../_admin/insertar_mercancia.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Item ingresado exitosamente.')

				 {
				    $("#impornum").val('');
					$("#fecha").val('');
					$("#marca").val('');
					$("#cubicaje").val('');
					$("#marcaz").val('');
				    $("#pares").val('');
					$("#valorneto").val('');
					$("#total").val('');
					$("#descuento").val('');
					$("#valoruni").val('');
					$("#bultos").val('');
					$("#yardas").val('N/A');
					$("#metros").val('N/A');
				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

 $("#view_mer").load("sacar_mercancia.php",function(){

     

	$(this).fadeIn("medium");
	//margen_der_abj_1
	 //convirtiendo los valores a moneda      
	$('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    

  }

  );

}



//sacar la fecha segun la importacion
  function fecha_segun_impor(user){

$.get('fecha_segun_impor.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#fecha").val($(xml).find('fecha').text());
	
	}
  );
}

//

//ver cliente individual

function editar_despacho(user){



$("#edit_mer").fadeIn('medium');

 $("#despachoid").val(user);

$.get('datos_despacho.php?iden='+user,{

    type: 'xml'

  },

  function(xml){

	 //necesario para las relaciones de los porductos 

	 $("#brand").val($(xml).find('cliente').text());
	 $("#import").val($(xml).find('impor_num').text());
	 $("#mercan").val($(xml).find('mercancia').text());
	 $("#shoe").val($(xml).find('calzado').text());
	 $("#impornum").val($(xml).find('impor_num').text());
	 $("#fecha").val($(xml).find('fecha').text());
	 $("#marca").val($(xml).find('cliente').text());
	 $("#tipo").val($(xml).find('mercancia').text());
	 $("#cubicaje").val($(xml).find('cubicaje').text());
	 $("#marcaz").val($(xml).find('calzado').text());
     $("#valoruni").val($(xml).find('ptraida').text());
     $("#pares").val($(xml).find('pares').text());
	 $("#valorneto").val($(xml).find('pneto').text());
     $("#descuento").val($(xml).find('desc').text());
	 $("#total").val($(xml).find('total').text());
     $("#idenl").val($(xml).find('mercancia').text());
	 $("#yardas").val($(xml).find('yardas').text());
     $("#metros").val($(xml).find('metros').text());
	 $("#bultos").val($(xml).find('bultos').text());
	 
	 

      if($("#idenl").val()==13)

	   {

	     $("#cubicajel").fadeOut("medium");
		 $("#paresl").fadeIn("medium");
		 $("#marcal").fadeIn("medium");
	     //$("#preciol").fadeIn("medium");
         $("#yardal").fadeOut("medium");
	     $("#metrosl").fadeOut("medium");
         
		

	   }

	   else

	   {
           if($("#idenl").val()!=15){
			   $("#cubicajel").fadeIn("medium");
			   $("#marcal").fadeOut("medium");
			   $("#paresl").fadeOut("medium");
			  // $("#preciol").fadeOut("medium");
			   $("#yardal").fadeOut("medium");
			   $("#metrosl").fadeOut("medium");
		   }
		   else
		   {
		       if($("#idenl").val()==15){
			   $("#yardal").fadeIn("medium");
			   $("#metrosl").fadeIn("medium");
			   $("#marcal").fadeIn("medium");
			  // $("#preciol").fadeIn("medium");
			   $("#paresl").fadeIn("medium");
			   
			   }
		   }
	   }

    //convirtiendo los valores a moneda      
	$('#valorneto').formatCurrency();
	$('#valorneto').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	
	
	$('#valoruni').formatCurrency();
	$('#valoruni').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#descuento').formatCurrency();
	$('#descuento').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#total').formatCurrency();
	$('#total').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	


	}
  );
  
  
}









//cerrar la ventana de clientes

function hola()

{

	$("#edit_mer").fadeOut("medium");

}

//editar clientes

function modificar_despacho(){

   

      if($("#tipo").val()==13)

	  {

	    if($("#impornum").val()==''||$("#fecha").val()==''||$("#marca").val()=='0'||$("#marcaz").val()==''||$("#pares").val()=='')

		{

		 alert('Los campos marcados con * son obligatorios.');

		}

		else

		{

		   //

		       if(mondea_dec($("#total").val())>0){

			  

			  var form= $("#edit_mer").serialize();

   

			$.post('edit_despacho.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Item Editado exitosamente.'){
                       
					   ver_clientes();
                       $("#edit_mer").fadeOut("medium");
					}	

				},{

		  

		      });

			  }

			  else

			  {

			     alert('Verifique que el valor total sea mayor que 0.');

			  }

		   

		   //

      

		}

	  }

	  else

	  {

	      if($("#impornum").val()==''||$("#fecha").val()==''||$("#marca").val()=='0'||$("#marcaz").val()==''||$("#pares").val()=='')

		{

		 alert('Los campos marcados con * son obligatorios.');

		}

		else

		{

		   //

		       if(mondea_dec($("#total").val())>0){

			  

			  var form= $("#edit_mer").serialize();

   

			$.post('edit_despacho.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Item Editado exitosamente.'){

					   ver_clientes();
                       $("#edit_mer").fadeOut("medium");
					}	

				},{

		  

		      });

			  }

			  else

			  {

			     alert('Verifique que el valor total sea mayor que 0.');

			  }

		   

		   //

      

		}

	  }

	 

	 

  

	



}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los ingresos seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('linea_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_despacho.php',{

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

//pasar de formato moneda a numero
  function mondea_dec(valor)
  {
           var currency = valor; 
           var number = Number(currency.replace(/[^0-9\.]+/g,"")); 
	 	   return number;
  }
//



//sacar el precio de los zapatos por xml

function sacar_precio_zapato(){
  $idvalor= $("#marcaz").val();
$.get('precio_calzado_marca.php?iden='+$idvalor,{
    type: 'xml'
  },
  function(xml){
	 $("#valoruni").val($(xml).find('precio').text());
	    //se convierten los valores a formato moneda
		$('#valoruni').formatCurrency();
		$('#valoruni').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
		
		
		
		
	$("#valorneto").val(mondea_dec($("#valoruni").val())*$("#pares").val());
     $('#valorneto').formatCurrency();
		$('#valorneto').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	 $("#total").val(mondea_dec($("#valorneto").val())-moneda_dec($("#descuento").val()));
	 		
		$('#total').formatCurrency();
		$('#total').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	}
  );
}
//sacar precio de traida de mercancia
function sacar_precio_zapato2(user,user2){
  
$.get('precio_traida_de_mercan.php?uid='+user+'/'+user2,{
    type: 'xml'
  },
  function(xml){
	 $("#valoruni").val($(xml).find('preciot').text());
	//$("#valorneto").val($("#valoruni").val()*$("#pares").val());
    // $("#total").val($("#valorneto").val()-$("#descuento").val());
	    $('#valoruni').formatCurrency();
		$('#valoruni').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	}
  );
}

//convvertir 




//fin convertir






//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

  //para que no genere caché y funcione en explorer
  $.ajaxSettings.cache = false;

   


   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

  // $("#preciol").fadeOut("medium");

   

   $("#guardar").bind('click',function(){

    

	  if($("#idenl").val()==13)

	  {

	    if($("#impornum").val()==''||$("#fecha").val()==''||$("#marca").val()=='0'||$("#marcaz").val()==''||$("#pares").val()==''||$("#bultos").val()=='')

		{

		 alert('Los campos marcados con * son obligatorios.');

		}

		else

		{

		    if(mondea_dec($("#total").val())>0){
			  ingresar_clientes();

			}

			else

			{

			  alert('Verifique que el valor total sea mayor que 0.');

			}

		}

	  }

	  else

	  {

	      if($("#impornum").val()==''||$("#fecha").val()==''||$("#marca").val()=='0'||$("#cubicaje").val()==''||$("#valorneto").val()=='')

			{

			 alert('Los campos marcados con * son obligatorios.');

			}

			else

			{

			     if(mondea_dec($("#total").val())>0){

			        ingresar_clientes();

			      }

				else

				{

				  alert('Verifique que el valor total sea mayor que 0.');

				}

		  

			}

	  }

	     

  });

     
	 
	//activar o desactivar eltipo de mercancia
	    $("#marca").change(function() {

           if($("#marca").val()!=0)
		   {
		      $("#tipo").attr("disabled","");
		   }
		   else
		   {
		      $("#tipo").attr("disabled","disabled");
		   }
		   
		
        });
	
	//

   $("#tipo").change(function() {

      $("#idenl").val( $("#tipo").val());
		  
			if($("#idenl").val()!=13 && $("#idenl").val()!=15 )
		
			   {
		
				 $("#yardal").fadeOut("medium");
				 $("#metrosl").fadeOut("medium");
				 $("#marcal").fadeOut("medium");
				// $("#preciol").fadeOut("medium");
				 $("#paresl").fadeOut("medium");
				 $("#cubicajel").fadeIn("medium");
				   sacar_precio_zapato2($("#marca").val(),$("#tipo").val());  
		          
				/*  //se limpian los valores
				 $("#valorneto").val("");
				 $("#descuento").val("");
				 $("#total").val("");*/
				  
			   }
		
			   else
		
			   {
				  if($("#idenl").val()==13)
				  {
					  $("#marcal").fadeIn("medium");
					 //$("#preciol").fadeIn("medium");
					 $("#paresl").fadeIn("medium");
					  $("#yardal").fadeOut("medium");
					 $("#metrosl").fadeOut("medium");
					  $("#cubicajel").fadeOut("medium");
					  //se limpian los valores
						 $("#valorneto").val("");
						 $("#descuento").val("");
						 //$("#total").val("");
				  }
				  else
				  {
					 if($("#idenl").val()==15)
					  {
						  $("#marcal").fadeOut("medium");
						 //$("#preciol").fadeOut("medium");
						 $("#paresl").fadeOut("medium");
						  $("#yardal").fadeIn("medium");
						 $("#metrosl").fadeIn("medium");
						 $("#cubicajel").fadeIn("medium");
			               sacar_precio_zapato2($("#marca").val(),$("#tipo").val()); 
					      
						  //se limpian los valores
						 $("#valorneto").val("");
						 $("#descuento").val("");
						 $("#total").val("");
							 
					  }
				  }
			   }
		
   });

   
 //sacar el precio de la marca del zapato
   $("#marcaz").change(function() {

      sacar_precio_zapato(); 
 
    

   });
   

   

   //sacar la fecha de salida segun la importacion
   $("#impornum").change(function() {

       fecha_segun_impor( $("#impornum").val()); 

    

   }); 

 
  $("#tipo").attr("disabled","disabled");
  ver_clientes(); 

});

 









