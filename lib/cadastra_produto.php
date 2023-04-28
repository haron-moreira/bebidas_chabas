<?php

use HaronMoreira\BebidasChabas\entities\Produto;
use HaronMoreira\BebidasChabas\services\CadastraProduto;

require '../vendor/autoload.php';

$produto = new Produto($_POST['nome_produto'],
                        $_POST['nome_fabricante'],
                        $_POST['qtd'],
                        $_POST['tipo_volume'],
                        $_POST['qtd_volume']);

if (CadastraProduto::Cadastrar($produto)) {
    echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href = '../produtos.php';</script>";
} else {
    echo "<script>alert('Falha ao cadastrar o produto" . $_POST['nome_produto'] . "!'); window.location.href = '../produtos.php';</script>";
}
