// JavaScript Document


 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }



//ingresar clientes


function sacar_municipio(){
    if($("#select_dpto").val()!='')
    {
        $("#select_municipio").load("saca_mun_emergente2.php?uid="+$("#select_dpto").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}

function ingresar_datos(){

 var form= $("#sub").serialize();

  $.post('../_admin/guarda_sucursales.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Sucursal Ingresada Exitosamente.')

				 {
				    $("#sub")[0].reset(); 
                   
				    /*$("#apellido_uno").val('');
					$("#apellido_dos").val('');
					$("#nombre_uno").val('');
					$("#nombre_dos").val('');
					$("#cedula").val('');
					$("#direccion").val('');
					$("#telefono_fijo").val('');
					$("#celular").val('');
					$("#email").val('');
					$("#cargo").val('');
					$("#tipo_sangre").val(''); 
					*/   	          
				
				 }

		}

	);

   

}
 


//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_sucursal.php",function(){

     

	$(this).fadeIn("medium");

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



 $("#edit_cli").load("datos_sucursal.php?uid="+$idvalor,function(){

     

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

     if($("#nombre").val()=='' || $("#direccion").val()=='' || $("#telefono").val()=='' || 
     $("#suc_contacto").val()=='' || $("#email_contacto").val()=='' || $("#tel_contacto").val()=='')

		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
				  var form= $("#edit_cli").serialize();
				$.post('edit_sucursal.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Sucursal Actualizada Con Exito.'){
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

		

		if( confirm('Desea eliminar las sucursales seleccionadas?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('sucursal_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_sucursales.php',{

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

   //$.ajaxSettings.cache = false;



    $("#sub").validate({
		rules: {			 
				select_cliente:{required:true},
				select_dpto:{required:true},
                select_municipio:{required:true},
                nombre:{required:true},
                direccion:{required:true},
                telefono:{required:true},
                suc_contacto:{required:true},
                email_contacto:{required:true,email:true},
                tel_contacto:{required:true}
			
			
		},
		submitHandler: function(form) {
			//if( $('#iden').val() == ''){
				ingresar_datos();
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

   

   $("#save_emp").bind('click',function(){
         
		
		 
		 
       /*if($("#nombre").val()=='' || $("#descrip	").val()=='' || $("#dl").val()=='' || $("#dd").val()=='' )

		{

		  alert('Los campos marcados con * son obligatorios');

		}

		else

		{

		 
		  


		}*/
ingresar_clientes();


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

 









