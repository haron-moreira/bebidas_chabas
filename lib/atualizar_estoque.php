<?php


use HaronMoreira\BebidasChabas\services\AtualizaProduto;

require '../vendor/autoload.php';

if (intval($_POST['qtd_recebida']) + intval($_POST['qtd_atual']) < 0){
    $qtd_nova = 0;
}
else {
    $qtd_nova = intval($_POST['qtd_recebida']) + intval($_POST['qtd_atual']);
}


if (AtualizaProduto::Atualizar(htmlspecialchars($_POST['id_produto_atualiza']), $qtd_nova, htmlspecialchars($_POST['valor_unitario']))) {
    echo "<script>
            alert('Estoque do produto " . $_POST['nome_produto_atualiza'] . " atualizado com sucesso.');
            window.location.href = '../produtos.php';
           </script>";
} else {
    echo "<script>
            alert('Falha ao atualizar estoque do produto: " . $_POST['nome_produto_atualiza'] . ". Tente novamente...');
            window.location.href = '../produtos.php';
           </script>";
}