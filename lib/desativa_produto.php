<?php

use HaronMoreira\BebidasChabas\services\DesativaProduto;

require '../vendor/autoload.php';

if (DesativaProduto::Desativar(htmlspecialchars($_POST['id_produto_remove']))) {
    echo "<script>
            alert('Produto ". $_POST['nome_produto_remove'] . " desativado com sucesso.');
            window.location.href = '../produtos.php';
           </script>";
} else {
    echo "<script>
            alert('Falha ao desativar produto: ". $_POST['nome_produto_remove'] . ". Tente novamente...');
            window.location.href = '../produtos.php';
           </script>";
}