<?php

use HaronMoreira\BebidasChabas\services\GetQtdProdutoEspecifico;
use HaronMoreira\BebidasChabas\services\ValidaEstoqueParaVenda;
use HaronMoreira\BebidasChabas\services\VenderViaFront;

require '../vendor/autoload.php';

header("Content-type: application/json");

$produtos = $_POST['produtos'];
$pagamento = $_POST['pagamento_posterior'];
$dados = $_POST['dados_cliente'];

error_log(json_encode($_POST));


foreach ($produtos['produtos'] as $key => $produto) {
    $validacao = false;
    if (ValidaEstoqueParaVenda::TemEstoque($key, $produto['quantidade'])) {
        $validacao = true;
    } else {
        $nome = $produto['name'];
        $qtd_estoque_produto = GetQtdProdutoEspecifico::QuantoEstoqueTem($key);
        http_response_code(401);
        echo json_encode(['produto'=>$nome,
                            'qtd'=>$qtd_estoque_produto]);
        die();
    }
}

if ($validacao) {

    if (VenderViaFront::Vender($produtos, $pagamento, $dados)) {
        http_response_code(200);
        echo json_encode(['status'=>200]);
        die();
    }
} else {
    http_response_code(500);
    echo json_encode(['retorno'=>'erro']);
    die();
}
