// JavaScript Document


//guardar barrios
 function guardar_servicios()
 {
    if($("#movil").val()=='0')
	 {
	    alert('Escoja el n\u00famero del movil');
	 }
	 else
	  {
	     if($("#cupo").val()=='')
		  {
		    alert('Digite el cupo');
		  }
		  else
		   {
		      // $("#dest").val($("#dest").val().replace(/ /g,'-'));
	         //  $("#dir").val($("#dir").val().replace(/ /g,'*'));
		 var dato3 = $("#movil option:selected").html();
				 
				 var form= $("#clientes").serialize();
				  $.post('guar_serv.php',form,
				  function(data){
				   alert(data);
						if(jQuery.trim(data)=='Servicio Guardado Exitosamente.'){
						  // ver_clientes();
						 //hora
                            	  var fecha = new Date();
                          var h= fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds(); 
						 //-------
						 
						  $("#edit_cli").fadeOut("medium");
						  $(location).attr('href','../_admin/tiquete.php?dato1='+$("#dest").val()+'&dato2='+$("#price").val()+'&dato3='+dato3+'&dato4='+$("#cupo").val()+'&dato5='+$("#dir").val()+'&dato6='+h);
						}	
					},{
					}
					);   
		   }
		
	  }
 }
 
  
//




//ingresar clientes

function ingresar_clientes(){

 var form= $("#clientes").serialize();

  $.post('../_admin/insertar_conductor.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Conductor Ingresado Satisfactoriamente.')

				 {
				    $("#nombre").val('');
     	            $("#apellido").val('');
                    $("#movil").val('');
                    $("#telefono").val('');
                    $("#direccion").val('');
				 }

		}

	);

   

}



//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_conductores.php",function(){

     

	$(this).fadeIn("medium");

  }

  );

}
function ver_servicios(){

 $("#view_cli").load("sacar_servicios.php",function(){

     

	$(this).fadeIn("medium");

  }

  ); 

}


function saco_barrio(user){
$("#nombarrio").load("saco_barrios.php?uid="+user,function(){
	$(this).fadeIn("medium");
  }
  );
}


function saco_pueblo(){
$("#nombarrio").load("saco_pueblos.php",function(){
	$(this).fadeIn("medium");
  }
  );
}

//busco direcciones
 function busco_direcciones(dato1,dato2,dato3){
$("#serv_tax").load("busco_direcciones.php?dato1="+dato1+"&dato2="+dato2+"&dato3="+dato3,function(){
	$(this).fadeIn("medium");
  }
  );
}
//

//busco barrios
 function busco_barrios(tipo){
$("#serv_tax").load("busco_barrios.php?tipo="+tipo,function(){
	$(this).fadeIn("medium");
  }
  );
}
//

//busco pueblos
 function busco_pueblos(tipo){
$("#serv_tax").load("busco_pueblos.php?tipo="+tipo,function(){
	$(this).fadeIn("medium");
  }
  );
}
//


//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_conductor.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");


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

    if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#movil").val()=='0' ||$("#telefono").val()=='' ||$("#direccion").val()=='' )
		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
			  var form= $("#edit_cli").serialize();
			  $.post('edit_conductor.php',form,
			  function(data){
  			   alert(data);
					if(jQuery.trim(data)=='Conductor Exitosamente Actualizado.'){
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

		

		if( confirm('Desea eliminar los conductores seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('conductor_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_conductores.php',{

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

		alert('Por favor seleccione los conductores  que desea eleminar');

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

   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

   $("#guardar").bind('click',function(){
	  
          if($("#ubicar").val()=='1')
		  {		 
			  if( ($("#nombarrio").val()=='0' ) )
				 {
				   alert('Escoja el nombre del barrio');
				   
				 }
				 else
				 {
				    if($("#dir").val()=='')
					 {
					  alert('Verifique que el campo direcci\u00f3n, no est\u00e9 vac\u00edo. ');
					 }
					 else
					  {
					   busco_barrios($("#nombarrio").val());
					  }
				 }
		  }
		  else
		   {
		     if($("#ubicar").val()=='2')
			  {
			      if($("#uno").val() !='' && $("#dos").val()!='' && $("#tres").val() !='')
				  {
				    $("#uno").val($("#uno").val().replace(/ /g,'-'));
					$("#dos").val($("#dos").val().replace(/ /g,'-'));
					
					busco_direcciones($("#call").val(),$("#uno").val(),$("#dos").val());  
				  }
				  else
				  {
				   alert('Verifique que los campos de la direcci\u00f3n no est\u00e9n vac\u00edos.');
				  }
				  
			  }
			  else
			   {
			    busco_pueblos($("#nombarrio").val());  
			   }
			 
		   }
		  
  });

 
 //

 

	  
         
		  
 
 
 

   $("#destino").change(function()
   {
     if($("#destino").val()=='1')
	  {
	    //$("#guardar").fadeOut("medium");
		$("#serv_tax").fadeOut("medium");
		$("#ub").fadeIn('medium');
		$(".direccion").fadeIn('medium');
		if($("#destino").val()=='1' || $("#destino").val()=='2' )
		  {
			$(".pueblo").fadeOut('medium');
			$(".barrio").fadeIn('medium');
			$(".direccion").fadeIn('medium');
		  }
		  else
		  {
			$(".pueblo").fadeIn('medium');
			$(".barrio").fadeOut('medium');
			$(".direccion").fadeOut('medium');
			$("#udt").fadeOut('medium');
		  }
		
		
		//saco_barrio(1);
		$("#nbarrio").fadeOut('medium');
		$("#call1").fadeOut('medium');
		$("#ub").fadeIn('medium');
		$("#ubicar").val('0');
		
	  }
	else
	 {
	   if($("#destino").val()=='2')
	   {
	     $("#ub").fadeIn('medium');
		 //saco_barrio(2);
		$(".barrio").fadeIn('medium');
		 $(".pueblo").fadeOut('medium');
		 $(".direccion").fadeOut('medium');
		 $("#serv_tax").fadeOut("medium");
		 // $("#guardar").fadeOut("medium");
		 $("#ubicar").val('0');
	   }
	  else
	   {
	     $("#ub").fadeIn('medium');
		
		 $(".barrio").fadeOut('medium');
		 $(".pueblo").fadeIn('medium');
		 $(".direccion").fadeOut('medium');
		 $("#ubicar").val('0');
	   }
	   // $("#ub").fadeOut('medium');
		 $("#pueblon").fadeOut('medium');
		 
		  $("#udt").fadeOut('medium');
		 $("#call1").fadeOut('medium');
	 }
	
	 
     
   });

 $("#ubicar").change(function()
   {
     if($("#ubicar").val()=='1' )
	  {
	    $("#nbarrio").fadeIn('medium');
		$("#call1").fadeOut('medium');
	    $("#pueblon").fadeOut('medium');
	     $("#udt").fadeOut('medium');
		saco_barrio($("#destino").val()); 
		 
	  }
	  else
	  {
	     if($("#ubicar").val()=='2' )
		  {
			$("#nbarrio").fadeOut('medium');
			$("#call1").fadeIn('medium');
		    $("#pueblon").fadeOut('medium');
			$("#call").val('0');
		  }
		  else
		  {
		     saco_pueblo();
			$("#nbarrio").fadeIn('medium');
		     $("#call1").fadeOut('medium');
			 $("#pueblon").fadeIn('medium');
		  }
	  }
     
   });
$("#call").change(function()
   {
     $("#udt").fadeIn('medium');
     
   });



 ver_servicios();

 // ver_clientes(); 

});

 









