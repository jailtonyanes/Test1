// JavaScript Document
function sacar_su(id)
{ 
  var ident='';
  ident = id.split('-');
  ident2 =id.split('_'); 
  
 
  var ident='';
  ident = ident2[2].split('-');

  

 var suc = ident[0]+ident[1];
 var cli = ident[0]+'-'+ident[1];
 
     $("#select_suc_"+suc).load("saca_suc_asoc2.php?uid1="+$("#select_cliente_"+cli).val(),function(){
		       $(this).fadeIn("medium");
       });
}

function abrir(div)
{
  $("#"+div).fadeIn("medium");
}

function cerrar(div)
{
  $("#"+div).fadeOut("medium");
}
 function res_listas()
 {
 	
 	$("#select_dpto").val('');
 	$("#select_municipio").val('');
 	$("#select_sucursal").val('');
 	
 	
 }

 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }



//ingresar clientes


function sacar_municipio(){
    if($("#select_dpto").val()!='')
    {
        $("#select_municipio").load("saca_mun_emergente.php?uid="+$("#select_dpto").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}

function sacar_dias_turno(){
    if($("#select_turno").val()!='')
    {
        $("#select_dia_ini_turno").load("sacar_dias_turno.php?uid="+$("#select_turno").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}



function sacar_guarda(){
    if($("#select_sucursal").val()!='')
    {
        $("#select_guarda").load("saca_guarda.php?uid1="+$("#select_dpto").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}

function saca_turno(){
    if($("#select_guarda").val()!='')
    {
        $("#select_turno").load("saca_turno.php",function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}




function sacar_suc_asoc()
{

     if($("#select_municipio").val()!='')
    {
        $("#select_sucursal").load("saca_suc_asoc.php?uid1="+$("#select_cliente").val()+"&uid2="+$("#select_dpto").val()+"&uid3="+$("#select_municipio").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	

}

function 	ingresar_datos(){

 var form= $("#sub").serialize();

  $.post('../_admin/programar_relevos.php',form,

		function(data){

			 	

				//alert(data);





				 var cadena = data;

				 if(cadena.indexOf('Duplicate entry') != -1)
				 {
                    alert(data);
				 }
                 else
                 {
                 	if(cadena.indexOf('1') != -1)
                     {

				
				   
                  alert('Programaci\u00f3n Ingresada Exitosamente.');
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
		}

	);

   

}
 


//ver clientes

function ver_clientes(){

 $("#view_cli").load("sacar_asignaciones.php",function(){
	$(this).fadeIn("medium");
     
      // Setup - add a text input to each footer cell
  


    //   $('#table_id').dataTable( {
    //     "scrollY":        "400px",
    //     "scrollCollapse": false,
    //     "paging":         true
    // } );



    $('#table_id tfoot th').each( function () {
        var title = $('#table_id thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#table_id').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );




  });
  
 



}



//sacar subcategorias

function subcategorias(){
  var valor=$("#select_turno").val();

 $("#sub_categoria_id").load("sacar_subcategoria.php?uid="+valor,function(){

     

	$(this).fadeIn("medium");

  }

  );


}

function desplegar()
{

 $("#turnos").load("sacar_campos_relevo.php?uid="+$("#select_turno").val(),function(){
		      $(this).fadeIn("medium");
        });

}





//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_cliente.php?uid="+$idvalor,function(){

     

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

		

		if( confirm('Desea eliminar las asignaciones seleccionadas?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('prog_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_asignaciones.php',{

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



//cuerpo del jquery, aq� se llaman todas las funciones y procedimientos

$(document).ready(function(){

      
   // Setup - add a text input to each footer cell

    //--------------



    $("#sub").validate({
		rules: {			 
				select_cliente:{required:true},
				select_dpto:{required:true},
                select_municipio:{required:true},
                select_sucursal:{required:true},
                select_guarda:{required:true},
                select_turno:{required:true},
                select_dia_ini_turno:{required:true},
                desde:{required:true},
                hasta:{required:true},
              
			
			
		},
		submitHandler: function(form) {
			
            var fecha1= new Date($("#desde").val());
            var fecha2= new Date($("#hasta").val());
            if(fecha1>fecha2)
            {
            	alert('Verifique que la fecha  inicio sea menor o igual a la fecha fin.');
            }
            else
            {
            	ingresar_datos();
            }
			//if( $('#iden').val() == ''){
				//ingresar_datos();
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

 









