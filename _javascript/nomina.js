// JavaScript Document


function calcu_disg()
{
   $("#datos_cli").load("informe.php?uid="+$("#fecha").val()+"&uid2="+$("#fecha2").val()+"&uid3="+$("#se_gu").val()+"&uid4="+$("#select_c").val()+"&uid5="+
   	$("#exd").val()+"&uid6="+$("#texd").val()+"&uid7="+$("#exdf").val()+"&uid8="+$("#texdf").val()+"&uid9="+$("#exnoctf").val()+"&uid10="+$("#texnf").val()
   	+"&uid11="+$("#exnoct").val()+"&uid12="+$("#texn").val()+"&uid13="+$("#fest_noche").val()+"&uid14="+$("#cont_fest_noche").val()
   	+"&uid15="+$("#fest_dia").val()+"&uid16="+$("#cont_fest_dia").val(),function(){
		      $(this).fadeIn("medium");
        });
}

function sumaFecha(d, fecha)
{
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[0]+'/'+aFecha[1]+'/'+aFecha[2];
 fecha= new Date(fecha);
 fecha.setDate(fecha.getDate()+parseInt(d-1));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate();
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = anno+sep+mes+sep+dia;
 return (fechaFinal);
 }

function calcula()
{
    if($("#select_c").val()!='')
    {
	   var d = $("#select_c").val();
	   var fecha = $("#fecha").val(); 
	   $("#fecha2").val(sumaFecha(d, fecha));
    }
    else
    {
    	alert('Escoja periodo de liquidaci\u00f3n');
    }		
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
        $("#select_guarda").load("saca_guarda.php?uid1="+$("#select_dpto").val()+"&uid2="+$("#select_municipio").val(),function(){
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

  $.post('../_admin/programar.php',form,

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

 $("#view_cli").load("sacar_nomina.php?f1="+$("#fecha").val()+"&f2="+$("#fecha2").val()+"&gu="+$("#se_gu").val()+"&ped="+$("#select_c").val(),function(){
	                            

	$(this).fadeIn("medium");
     
         $('#table_id').DataTable( {
       
         //para sumar
         
         //-----------
          

        initComplete: function() {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );








  });
  
 
//--------------


//--------------






}


//sacar subcategorias

function subcategorias(){
  var valor=$("#categoria_id").val();

 $("#sub_categoria_id").load("sacar_subcategoria.php?uid="+valor,function(){

     

	$(this).fadeIn("medium");

  }

  );


}

function saca_gu_em(){
 

 $("#se_gu").load("saca_emp_em.php?uid="+$("#fecha").val()+"&uid2="+$("#fecha2").val(),function(){

     

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



//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

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

  


 

  //ver_clientes(); 

});

 









