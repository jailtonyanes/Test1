// JavaScript Document

function abrir(div)
{
  $("#"+div).fadeIn("medium");
}

function cerrar(div)
{
  $("#"+div).fadeOut("medium");
}
function sacar_municipio(){
    if($("#select_dpto").val()!='')
    {
        $("#select_municipio").load("saca_mun_emergente.php?uid="+$("#departamento_id").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}


 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }



//ingresar clientes

function ingresar_clientes(){

 var form= $("#sub").serialize();

  $.post('../_admin/guarda_empleados.php',form,

		function(data){

			 	

				alert(data);

				 if(jQuery.trim(data)=='Empleado Ingresado Exitosamente.')

				 {
			   	           
				    $("#sub")[0].reset(); 
				 }

		}

	);

   

}
 


//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_empleado.php",function(){

     

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
 $("#edit_cli").load("datos_empleado.php?uid="+$idvalor,function(){
	$(this).fadeIn("medium");
  });

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
				$.post('edit_empleados.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Empleado actualizado con exito.'){
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

		

		if( confirm('Desea eliminar los empleados seleccionados?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('empleado_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_empleados.php',{

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

   $("#per").fadeOut('medium');
   //$.ajaxSettings.cache = false;

   $("#sub").validate({
		rules: {			 
				apellido_uno:{required:true},
				//apellido_dos:{required:true},
                nombre_uno:{required:true},
                //nombre_dos:{required:true},
                cedula:{required:true},
                direccion:{required:true},
                telefono_fijo:{required:true},
                celular:{required:true},
                //email:{required:true},
                cargo:{required:true},
                tipo_sangre:{required:true},
                departamento_id:{required:true},
                select_municipio:{required:true},
                barrio:{required:true}
                

			
			
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

 









