<?php

use HaronMoreira\BebidasChabas\entities\Venda;
use HaronMoreira\BebidasChabas\services\ProcessoVenda;

require '../vendor/autoload.php';

header("Content-type: application/json");

$venda = json_decode(file_get_contents("php://input"), 1);

if (ProcessoVenda::ProcessoVenda(new Venda($venda))) {
    http_response_code(200);
    $retorno = json_encode(['status'=>'sucesso']);
    die($retorno);
} else {
    http_response_code(500);
    $retorno = json_encode(['status'=>'falha']);
    die($retorno);
}