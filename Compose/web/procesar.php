<?php
$usuario = $_POST['usuario'];

$items = array();

// Recorrer los valores de cantidad enviados por el formulario
foreach ($_POST['cantidad'] as $id => $cantidad) {
    if ($cantidad > 0) {
        // Definir $item dentro del foreach para evitar sobrescribirlo en cada iteración
        $item = array();  // Crear un nuevo array en cada iteración
        $item['id'] = $id;
        $item["cantidad"] = $cantidad;
        array_push($items, $item);  // Añadir el item al array de items
    }
}

$orden = array();
$orden['usuario'] = $usuario;
$orden['items'] = $items;

// Convertir la orden a formato JSON
$json = json_encode($orden);

// URL del microservicio de órdenes (usa 'ordenes' como el nombre del servicio en Docker)
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

// Verificar el estado HTTP de la respuesta
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Cerrar la conexión cURL
curl_close($ch);

// Si todo fue bien, redirigir al usuario
header("Location:usuario.php");
exit();  // Detener la ejecución después de redirigir
?>
