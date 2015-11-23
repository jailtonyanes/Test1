// JavaScript Document
//para continuar las encuestas
 function valor_asoc(){
  var user=$('#ced_cont').val();
$.get('valor_asociado_fact.php?iden='+user,{
    type: 'xml'
  },
  function(xml){
	 $("#part").val($(xml).find('valor').text());
	  $("#ultimo_u").val($(xml).find('id').text());
	}
  );
}
function continuacion()
{
          if($("#part").val()!='')
		   {
			$("#seguro").val(parseInt($("#part").val()));
			$("#content2").slideUp('medium');
			$("#preguntas").load("parte"+$("#part").val()+".php?uid=1",function(){
								
								  $(this).fadeIn("medium");
								  }
								  );
		   
		  }
		   else
		    {
			 alert('No hay datos asociados a ese documento de identidad.');
			}
}

function muestra(num)
{
    
   if($('#'+num).val()=="1")
    {
	  
	  $("#primer_episodio").val('N/A');
	    $("#produjo").val('N/A');
		 $("#mejora").val('N/A');
		  $("#empeora").val('N/A');
		   $("#sintomas").val('N/A');
		   
		 $("#evaluacion").val('No he requerido');
	    $("#apis").val('No las requeri');
		 $("#cuales").val('N/A');
		  $("#diagnose").val('N/A');
		   $("#trata").val('No');
		 
		  $("#tipo_de_t").val('N/A');
	    $("#tinca").val('No recibi');
		 $("#vinca").val('No he  recibido incapacidad');
		  $("#secuelas").val('No');
		   $("#tipo_de").val('N/A');
		   
		
		
	  
	}
}

function percenta(num)
{
   if($('#'+num).val()=="2")
    {
     $("#pq").val('N/A');
	}
}

function decidir()
 {
    $("#legalidad").fadeOut("medium");
	var op=$("#acepto").val();
	 $("#preguntas").load("parte1.php?uid="+op,function(){
	$(this).fadeIn("medium");
  }
  );
 }


//ingresar clientes


//para guardar los ambientales
function guardar_ambientales(){

     if( confirm('Desea guardar las respuestas seleccionadas?') )

		{   
			  if($("#ced_cont").val()!='')
			  {
			    $("#docu").val($("#ced_cont").val());
			  }
			
			 
			  var form= $("#uno").serialize();
			  $.post('../_admin/guardar_ambientales.php',form,
					function(data){
			             //$("#seguro").val(parseInt($("#seguro").val())+1);
                          alert(data);
						    if(jQuery.trim(data)=='ok')
							 {
							   $("#seguro").val(parseInt($("#seguro").val())+1);
							 //este procedimiento se llama recursivamente
								$("#preguntas").load("parte"+$("#seguro").val()+".php?uid=1",function(){
								
								  $(this).fadeIn("medium");
								  }
								  );
							 //
							 }
							 else
							  {
							    //este procedimiento se llama recursivamente
								$("#preguntas").load("parte"+$("#seguro").val()+".php?uid=1",function(){
								  $(this).fadeIn("medium");
								  }
								  );
							   //
							  }
					}
				);
		}
   

}
//

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/insertar_clientes.php',form,

		function(data){
                 
			 	$("#ced_cont").val($("#document1").val());
                   
				alert(data);
				 if(jQuery.trim(data)=='Usuario Ingresado Satisfactoriamente.')
				 {
						$("#nombre").val('');
						$("#apellido").val('');
						$("#document1").val('');
						$("#expedition").val('');
						$("#sexo").val('');
						$("#anti").val('');
						$("#fnac").val('');
						$("#est_civil").val('');
						$("#escolaridad").val('');
						$("#profesion").val('');
						$("#ciudad").val('');
						$("#municipio").val('');
						$("#estrato").val('');
						$("#vivienda").val('');
						$("#pcargo").val('');
						$("#cargo_c").val('');
						$("#content2").slideUp('medium');
						legal();
						
				 }
		}
	);

   

}



//ver clientes

function ver_clientes(){
 $("#edit_cli").load("sacar_clientes.php",function(){
	$(this).fadeIn("medium");
  }
  );
}


function legal(){
 $("#legalidad").load("legal.php",function(){
	$(this).fadeIn("medium");
  }
  );
}



//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_cliente.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");

	//$("#content1").fadeOut("medium");

	    //convirtiendo los valores a moneda      
	$('#cacharro').formatCurrency();
	$('#cacharro').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	$('#clazadob').formatCurrency();
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
	$('#tela').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
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

     if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#ciudad").val()=='0' ||$("#direccion").val()=='' ||$("#telefono").val()=='' )

		{

		  alert('Los campos marcados con * son obligatorios');

		}

		else

		{

		  if($("#email").val()!='' && !(valEmail($("#email").val())))

		  {

		   alert('Verifique que su email este bien escrito');

		  }

		  else{

				  var form= $("#edit_cli").serialize();

				

				$.post('edit_clientes.php',form,

				function(data){

						alert(data);

				

					if(jQuery.trim(data)=='Cliente Exitosamente Actualizado.'){

					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	

				},{

				  

				}

				

				);

		  

		  

		  }

		}

   

   

  

  

	



}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los clientes seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('cliente_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_clientes.php',{

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

  // $.ajaxSettings.cache = false;
  $("#clientes").validate({
		rules: {			 
			nombre:{required:true},
			apellido:{required:true},
			document1: { required: true,number:true },
			expedition:{required:true},
			sexo:{required:true},
			anti:{required: true},
			fnac:{required: true},
			
			est_civil:{required: true},
			escolaridad:{required: true},
			profesion:{required: true},
			ciudad:{required: true},
			municipio:{required: true},
			estrato:{required: true},
			vivienda:{required: true},
			pcargo:{required: true},
			cargo_c:{required:true},
			
			
		},
		submitHandler: function(form) {
			
				ingresar_clientes();
			
			
		},
		errorElement: 'span',
		debug: true
	});


//validar el formulario de las preguntas de condiciones ambuentales

//
   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

  /* $("#guardar").bind('click',function(){

        if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#ciudad").val()=='0' ||$("#direccion").val()=='' ||$("#telefono").val()=='')

		{

		  alert('Los campos marcados con * son obligatorios');

		}

		else

		{

		  if($("#email").val()!='' && !(valEmail($("#email").val())))

		  {

		   alert('Verifique que su email este bien escrito');

		  }

		  else{

		  ingresar_clientes();

		  }

		}

  });*/

      

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

  


 

 // ver_clientes(); 

});

 









