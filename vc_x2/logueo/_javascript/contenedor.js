


//ver clientes

function ver_estado(){

 $("#view_est").load("sacar_contenedor.php",function(){

     

	$(this).fadeIn("medium");
		$('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });

  }

  );

}

function estado_por_contenedor(user)
 {
     $idvalor=user;

 $("#detalle_contenedor").load("est_cuenta_contenedor_individual.php?uid="+$idvalor,function(){
 	$(this).fadeIn("medium");
			$('.margen_der_abj_1').formatCurrency();
	$('.margen_der_abj_1').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
  }
  );
 }


function cierra_reporte()
{
   $("#detalle_contenedor").fadeOut("medium");
}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

  
 

  ver_estado(); 

});

 









