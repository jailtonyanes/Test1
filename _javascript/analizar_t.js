// JavaScript Document

function calcula_recargo()
{
   var valor_hora=0;
   valor_hora =  $('#salbase').val()/240;

   //hora ordinaria Diurna
   $('#hod').val(Math.round(valor_hora)); 
   //hora con recargo nocturno
   $('#horn').val(Math.round(valor_hora*0.35)); 
   //hora extradiurna
   $('#hed').val(Math.round(valor_hora*1.25));
   //hora extranocturna
   $('#hen').val(Math.round(valor_hora*1.75));
   //hora ordianria dominical diurna
   $('#hodd').val(Math.round(valor_hora*1.75));
   //hora ordinaria dominical nocturna
   $('#hrdn').val(Math.round(valor_hora*1.1));
  //hora extra dominical diurna
   $('#hedd').val(Math.round(valor_hora*2));
   //hora extra dominical nocturna
   $('#hedn').val(Math.round(valor_hora*2.5));

   if($('#salbase').val() <= 2*644350 && $('#salbase').val() != '' )
   {
         $('#sub_tr').val('74000');

   }
   else
   { 
       $('#sub_tr').val('N/A');    
   }
      

}

function cerrar()
{
  $('#analisis').fadeOut('medium');	
  ver_clientes();
}

function analizar(valor)
{
  $('#view_cli').fadeOut('medium');
  $('#anuncio').fadeIn('medium');
  $('#anuncio2').fadeOut('medium');
   
   $("#analisis").load("datos_turno_analizar.php?uid="+valor,function(){

     

	$(this).fadeIn("medium");

  }

  );

}

function sumar()
{
  if($('#dtd').val()=='' )
  {
    
    $('#dl').val(parseInt(0)+parseInt($('#dtn').val())); 
  }
  else
  {
   	 if($('#dtn').val()=='')
   	 {
       
       $('#dl').val(parseInt($('#dtd').val())+parseInt(0));	 	
   	 }
   	 else
   	 {
   	   $('#dl').val(parseInt($('#dtd').val())+parseInt($('#dtn').val()));	
   	 }
  }
}

 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }



//ingresar clientes

function ingresar_clientes(){

 var form= $("#sub").serialize();

  $.post('../_admin/guarda_turnos.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Turno Ingresao Exitosamente.')

				 {
     	            $("#sub")[0].reset(); 				
				 }

		}

	);

   

}
 


//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_turno_ana.php",function(){

     

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



 $("#edit_cli").load("datos_turno.php?uid="+$idvalor,function(){

     

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

     if($("#nombre").val()=='' || $("#descrip").val()=='' ||$("#dtd").val()=='' ||$("#inidia").val()=='' ||$("#findia").val()=='' ||
     $("#dtn").val()=='' ||$("#ininoche").val()=='' ||$("#finnoche").val()=='' ||$("#dd").val()=='' ||$("#dl").val()=='' ||
     $("#tipo_inicio").val()=='' ||$("#tp_j").val()=='')

		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
				  var form= $("#analisis").serialize();
				$.post('edit_turnos.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Turno acutalizado con exito.'){
					   ver_clientes();
                      $("#analisis").fadeOut("medium");    
					}	
				},{
				}
				);
		}

   

   

  

  

	



}



//eliminar clientes

function delete_turnos()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar los turnos seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('turno_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_turnos.php',{

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
				nombre:{required:true},
				descrip:{required:true},
                dl:{required:true},
                dd:{required:true},
                tipo_inicio:{required:true},
                dtd:{required:true},
                dtn:{required:true},
                inidia:{required:true},
                findia:{required:true},
                 ininoche:{required:true},
                finnoche:{required:true},
                tp_j:{required:true},



			
			
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

 









