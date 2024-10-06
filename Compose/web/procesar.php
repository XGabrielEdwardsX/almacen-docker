<?php
$usuario = $_POST['usuario'];

$items = array();

// **Inicio de la modificación: Reemplazo del foreach**
$items = array_values(array_filter(array_map(function($id, $cantidad) {
    return ($cantidad > 0) ? ['id' => $id, 'cantidad' => $cantidad] : null;
}, array_keys($_POST['cantidad']), $_POST['cantidad'])));
// **Fin de la modificación**

$orden['usuario'] = $usuario;
$orden['items'] = $items;

$json = json_encode($orden);
//echo $json;

$url = 'http://ordenes:3003/ordenes';

// Inicializar cURL
$ch = curl_init();

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud POST
$response = curl_exec($ch);

// Manejar la respuesta
if ($response === false){
    header("Location:index.html");
}
// Cerrar la conexión cURL
curl_close($ch);

header("Location:usuario.php");

?>
