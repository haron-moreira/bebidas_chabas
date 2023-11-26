<?php

use HaronMoreira\BebidasChabas\services\Pagar;

require '../vendor/autoload.php';

header("Content-type: application/json");

$id = $_REQUEST['id'];

if (Pagar::RegistrarPagamento(htmlspecialchars($id))) {
    http_response_code(200);
    echo json_encode(['status'=>200]);
    die();
} else {
http_response_code(500);
echo json_encode(['retorno'=>'erro']);
die();
}
