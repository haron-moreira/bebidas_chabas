<?php

use HaronMoreira\BebidasChabas\services\AlteraUsuarioViaAdmin;

require '../vendor/autoload.php';

$nomeUsuario = htmlspecialchars($_POST['nome_usuario_atualiza']);
$nv_acesso = htmlspecialchars($_POST['nv_acesso']);
$id = htmlspecialchars($_POST['id_usuario_atualiza']);

    if (AlteraUsuarioViaAdmin::Alterar($nomeUsuario, $nv_acesso, $id)) {
        echo "<script>
        alert('Alterações salvas.');
        window.location.href = '../user_manager.php';
       </script>";
    };

    echo "<script>
        alert('Algo deu errado no momento da atualização dos dados. Tente novamente.');
        window.location.href = '../user_manager.php';
       </script>";


