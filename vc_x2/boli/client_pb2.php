<?php
require_once('nusoap.php');
// Crear un cliente apuntando al script del servidor (Creado con WSDL)
$serverURL = 'https://powerservice.finotex.com:441/powerservice';
$serverScript = 'n_powerservice.asmx';
$metodoALlamar = 'f_cadena';

$cliente = new nusoap_client("$serverURL/$serverScript?wsdl", 'wsdl');
$cliente->soap_defencoding = 'UTF-8';
// Se pudo conectar?
$error = $cliente->getError();
if ($error) {
	echo 'sc<pre style="color: red">' . $error . '</pre>';
	echo '<p style="color:red;'>htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</p>';
	die();
}

// 1. Llamar a la funcion getRespuesta del servidor
$result = $cliente->call(
    "$metodoALlamar"/*,                     // Funcion a llamar
    array('ps_usuario' => 'powerservice','ps_contrasena' => '#†@‹%š&‡#Œ%‹@ &–*‘$˜# @Í%Ï&Î#Í', 'ps_compania' => 'STC', 'ps_articulo' => 'YTEX00001', 'ps_unidad' => 'UND.'),    // Parametros pasados a la funcion
    "uri:$serverURL/$serverScript/",                   // namespace
    "uri:$serverURL/$serverScript/$metodoALlamar"       // SOAPAction
*/);
// Verificacion que los parametros estan ok, y si lo estan. mostrar rta.
if ($cliente->fault) {
    echo '<b>Error: ';
    print_r($result);
    echo '</b>';
} else {
    $error = $cliente->getError();
    if ($error) {
        echo 'cc<b style="color: red">Error: ' . $error . '</b>';
    } else {
    	echo 'Respuesta: '.$result['f_cadenaResult'];
    }
}

?>