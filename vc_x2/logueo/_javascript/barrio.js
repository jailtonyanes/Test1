// JavaScript Document





//ingresar clientes

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/insertar_barrio.php',form,

		function(data){

			 	

				//alert(data);

				 if(jQuery.trim(data)=='Barrio/Pueblo Ingresado Satisfactoriamente.')

				 {
				    $("#barrio").val('');
     	            $("#zona").val('89');
					$("#precio").val('$19,000');
					//$("#price").fadeOut('medium');
                   
				
				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_barr_pueblo.php",function(){

     

	$(this).fadeIn("medium");

  }

  );
 $("#view_cli2").load("sacar_pueblo.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}




//ver cliente individual

function editar_cliente(user){
 $("#iden").val(user);
 $idvalor=document.getElementById('iden').value;
 $("#edit_cli").load("datos_barrio.php?uid="+$idvalor,function(){
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
function editar_cliente2(user){
 $("#iden").val(user);
 $idvalor=document.getElementById('iden').value;
 $("#edit_cli2").load("datos_pueblo.php?uid="+$idvalor,function(){
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
function hola2()

{

	$("#edit_cli2").fadeOut("medium");

}

//editar clientes

function modificar_clientes(){
     if($("#nom_zona").val()==''  )
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
				  var form= $("#edit_cli").serialize();
				$.post('edit_barrios.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Barrio Exitosamente Actualizado.'){
					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				}
				);
		}
}

function modificar_clientes2(){
     if($("#nom_zona").val()==''  )
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
				  var form= $("#edit_cli2").serialize();
				$.post('edit_pueblo.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Pueblo Exitosamente Actualizado.'){
					   ver_clientes();
                      $("#edit_cli2").fadeOut("medium");    
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
		if( confirm('Desea eliminar los barrios seleccionados?') )
		{   
			var users = '';
			var arr = $("#datos_cli input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('barrio_id=' + n.value);
			});
			users = arr.join(" or ");
			$.post('eliminar_barrios.php',{
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

function delete_clients2()
{
	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)
	 {
		if( confirm('Desea eliminar los pueblos seleccionados?') )
		{   
			var users = '';
			var arr = $("#datos_cli input[type=checkbox]:checked");
			arr = jQuery.map(arr, function(n, i){
			return ('pueblo_id=' + n.value);
			});
			users = arr.join(" or ");
			$.post('eliminar_pueblos.php',{
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

   $.ajaxSettings.cache = false;

   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

   $("#guardar").bind('click',function(){
        if($("#zona").val()=='0' ||$("#barrio").val()=='' || $("#precio").val()==''  )
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
		    ingresar_clientes();
		}
  });

      

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


//

//

	

	 /*if($("#tipo").val()=="1")

	  {

	   $("#cubicaje").fadeIn("medium");

	  }

	  else

	  {

	     $("#cubicaje").fadeOut("medium");

	  }*/

    

   });



  /* $("#zona").change(function() {
       var cad= $("#zona option:selected").html();
	   if (cad.indexOf('Pueblos')!=-1)
	   {
          $("#price").fadeIn('medium');
		  $("#precio").val('');
       }
	   else
	   {
	     $("#price").fadeOut('medium');
		 $("#precio").val('');
	   }
   });*/
 

  ver_clientes(); 

});

 









