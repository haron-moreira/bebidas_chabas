<?php

use HaronMoreira\BebidasChabas\services\AtivaProduto;

require '../vendor/autoload.php';

if (AtivaProduto::Ativar(htmlspecialchars($_POST['id_produto_ativa']))) {
    echo "<script>
            alert('Produto ". $_POST['nome_produto_ativa'] . " desativado com sucesso.');
            window.location.href = '../produtos.php';
           </script>";
} else {
    echo "<script>
            alert('Falha ao desativar produto: ". $_POST['nome_produto_ativa'] . ". Tente novamente...');
            window.location.href = '../produtos.php';
           </script>";
}