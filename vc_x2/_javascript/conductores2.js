// JavaScript Document
function ancla()
{
  
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
	
}


function cerrar()
 {
   
   $("#edit_cli").hide("slow");
 }
 
 function cerrar_main()
 {
  
   $("#view_cli2").hide("slow");
 }

//para ver los detalles de los clientes
function fotosuc(user){


  
 $("#edit_cli").load("det_suc2.php?uid="+user,function(){
	$(this).show("slow");
  }
  );
}

//sacar los centros de costo emergentes
function info_sucur_alt(user){

 var user2=$("#cen").val();
  
 $("#sucur").load("info_sucur_alt.php?uid="+user+"&user2="+user2,function(){
	$(this).show("slow");
  }
  );
}

//para ver los detalles de seguridad
function est_seg(user){


  
 $("#edit_cli").load("det_seg.php?uid="+user,function(){
	$(this).show("slow");
  }
  );
}

//consignas
function consignas(user){
 $("#edit_cli").load("det_consignas.php?uid="+user,function(){
	$(this).show("slow");
   }
  );
}

//infomre de mercancia recuperada
function conmr(sucursal,nit,centcos){
 $("#edit_cli").load("det_consignas_mr.php?uid="+sucursal+"&nit="+nit+"&centcos="+centcos,function(){
	$(this).show("slow");
   }
  );
}



//esta funcion es para ver la info de los clientes
function abrir(centcos,division,cliente,centro_costo)
 {
    var i=0;
	for(i=1;i<=centcos;i++)
	 {
     	  if(division!= i )
		   {
		      $("#d"+i).slideUp("slow");
		   }
		   else
		    {
			       $("#d"+division).load("info_sucursales.php?cliente="+cliente+"&centcos="+centro_costo,function(){
	                   $(this).slideDown("slow");
 	                 }
		          );
				 
			}
		
	 }
	 
 }
 
 
 //esta funcion es para ver la info de los clientes
function abrir_mr(centcos,division,cliente,centro_costo)
 { 
    var i=0;
	for(i=1;i<=centcos;i++)
	 {
     	  if(division!= i )
		   {
		      $("#d"+i).slideUp("slow");
		   }
		   else
		    {
			       $("#d"+division).load("info_sucursales_mr.php?cliente="+cliente+"&centcos="+centro_costo,function(){
	                   $(this).slideDown("slow");
 	                 }
		          );
				 
			}
		
	 }
	 
 }


function cliente(user)
 {
	  $("#view_cli2").load("info_cli.php?uid="+user,function(){
	
		 
	
		$(this).slideDown("slow");

	  }
	
	  );
 }
 
 //esta funcion es para ver los contratos del cliente
function contratos(cliente)
 {
     $("#d1").load("info_contratos.php?cliente="+cliente,function(){
	                   $(this).slideDown("slow");
 	                 }
		          );
 }

function cliente(user)
 {
	  $("#view_cli2").load("info_cli.php?uid="+user,function(){
	
		 
	
		$(this).slideDown("slow");

	  }
	
	  );
 }
 
function mercancia(user)
 {
	  $("#view_cli2").load("info_mer_rec.php?uid="+user,function(){
	
		 
	
		$(this).slideDown("slow");

	  }
	
	  );
 }
 
function contrato(user)
 {
	  $("#view_cli2").load("info_contract.php?uid="+user,function(){
	
		 
	
		$(this).slideDown("slow");

	  }
	
	  );
 }
 


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



//ver cliente individual








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
	   if($("#nombre").val()=='' ||$("#apellido").val()=='' ||$("#movil").val()=='0' ||$("#telefono").val()=='' ||$("#direccion").val()=='' )
		{
		  alert('Los campos marcados con * son obligatorios');
		}
		else
		{
		  ingresar_clientes();
		}
  });

      

   $("#destino").change(function()
   {
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
	  }
     
   });

   $("#ubicar").change(function()
   {
     if($("#ubicar").val()=='1' )
	  {
	    $("#nbarrio").fadeIn('medium');
		$("#call1").fadeOut('medium');
	  }
	  else
	  {
	      $("#nbarrio").fadeOut('medium');
		  $("#call1").fadeIn('medium');
	  }
     
   });



 
//mostraba los clientes
//  ver_clientes(); 

});

 









