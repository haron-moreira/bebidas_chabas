<?php

use HaronMoreira\BebidasChabas\services\NovoUsuario;

require '../vendor/autoload.php';



if (NovoUsuario::InserirNovo(htmlspecialchars($_POST['login']),
    htmlspecialchars($_POST['nome']),
    htmlspecialchars($_POST['senha']),
    htmlspecialchars($_POST['nv_acesso']),
    true)) {
    echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '../user_manager.php';</script>";
} else {
    echo "<script>alert('Falha ao cadastrar o Usuário " . $_POST['nome'] . "!'); window.location.href = '../user_manager.php';</script>";
}