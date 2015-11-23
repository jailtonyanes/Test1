


//ver clientes

function ver_estado(){

 $("#view_estc").load("sacar_estc_cliente.php",function(){

     

	$(this).fadeIn("medium");
		$('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });

  }

  );

}

function cierra_reporte()
{
   $("#detalle_cliente").fadeOut("medium");
}

function sacar_estado(user,user2)
 {
     $idvalor=user;
	  $idvalor2=user2;

 $("#detalle_cliente").load("est_cuenta_cliente_individual.php?uid="+$idvalor+"/"+$idvalor2,function(){
 	$(this).fadeIn("medium");
	 $('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
  }
  );
 }

/*
function verificar_ingreso(id){
 $idvalor=id;

 $("#ingreso_y_n").load("ingreso_y_n.php?uid="+$idvalor,function(){
 	$(this).fadeIn("medium");
	
  }
  );
}
*/




//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

  
 

  ver_estado(); 

});

 









