// JavaScript Document


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



function sacar_lc(parametro)
{
   $("#view_cli").fadeOut('medium');
   $("#fb").load("sacar_filtros.php?uid="+parametro,function(){
          $(this).fadeIn("medium");
        });
}



function sacar_dep_em()
{
	 if($("#select_cliente").val()!='')
    {
        $("#select_dpto").load("saca_dep_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });

        $("#select_sucursal").val('');
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     }
}


//ingresar clientes

function sacar_puesto_asoc()
{
	if($("#select_sucursal").val()!='')
    {
        $("#select_puesto").load("saca_puesto_emergente.php?uid="+$("#select_sucursal").val(),function(){
		      $(this).fadeIn("medium");
        });

       // $("#select_sucursal").val('');
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     }
}


function sacar_municipio(){
    if($("#select_dpto").val()!='')
    {
        $("#select_municipio").load("saca_mun_emergente.php?uid1="+$("#select_dpto").val()+"&uid2="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });

        $("#select_sucursal").val('');
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

 $("#view_cli").load("sacar_lista_clientes.php?uid1="+$("#n").val()
 	+"&uid2="+$("#f1").val()+"&uid3="+$("#f2").val(),function(){
	$(this).fadeIn("medium");
     
      // Setup - add a text input to each footer cell
  


    //   $('#table_id').dataTable( {
    //     "scrollY":        "400px",
    //     "scrollCollapse": false,
    //     "paging":         true
    // } );



    // $('#table_id tfoot th').each( function () {
    //     var title = $('#table_id thead th').eq( $(this).index() ).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // // DataTable
    // var table = $('#table_id').DataTable();
 
    // // Apply the search
    // table.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.footer() ).on( 'keyup change', function () {
    //         that
    //             .search( this.value )
    //             .draw();
    //     } );
    // } );

    $('#table_id').DataTable( {

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

function editar_cliente(user,user2){

 $("#view_cli").fadeOut('medium');

 $("#iden").val(user);
 $("#iden2").val(user2);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_cliente.php?uid="+$idvalor+"&uid2="+user2,function(){

     

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
			    
          if(parseInt($("#n_horas").val())<=parseInt($("#iden3").val()))
          {
			    var form= $("#sub").serialize();
				$.post('edit_clientes.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='NOVEDAD MONTADA CON EXITO.'){
					   window.location.href ='ver_asignaciones.php?uid1='+$("#iden2").val()+"&uid2="+$("#fini").val()+"&uid3="+$("#f_fin").val();
					}	
				},{
				});
          }
          else
          {
          	alert('NUMERO DE HORAS PARA LA NOVEDAD  EXDEDE A LA JORNADA');
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

    if(parseInt($('#iden3').val())>=12)
    {
      $('#n_horas').attr("max", "8");
      $('#iden3').val('8'); 	
    }
    else
    {
      $('#n_horas').attr("max", $('#iden3').val());	
    }

     

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

 









