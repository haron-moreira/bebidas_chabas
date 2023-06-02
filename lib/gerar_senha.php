<?php

use HaronMoreira\BebidasChabas\helpers\GerarSenha;
use HaronMoreira\BebidasChabas\services\ResetSenha;

require '../vendor/autoload.php';

$senha = GerarSenha::Generate();
$id = htmlspecialchars($_GET['id']);
$usuario = htmlspecialchars($_GET['nome']);

if (ResetSenha::Reset($senha, $id)) {
    echo '<script>
        alert("Senha do usuário '.$usuario.' redefinida. \n\nNova senha temporária: '.$senha.' " +
         "\n\nLembre de pedir ao usuário para alterar a senha após o primeiro acesso.");
        window.location.href = "../user_manager.php";
      </script>';
} else {
    echo '<script>
        alert("Senha do usuário '.$usuario.' não alterada. \nTente novamente.");
        window.location.href = "../user_manager.php";
      </script>';
}
