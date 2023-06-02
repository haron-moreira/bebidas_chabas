<?php

use HaronMoreira\BebidasChabas\services\AtivaUsuario;

require '../vendor/autoload.php';

if (AtivaUsuario::Ativar(htmlspecialchars($_POST['id_usuario_ativa']))) {
    echo "<script>
            alert('Usuário ". $_POST['nome_usuario_ativa'] . " ativado com sucesso.');
            window.location.href = '../user_manager.php';
           </script>";
} else {
    echo "<script>
            alert('Falha ao ativar usuário: ". $_POST['nome_usuario_ativa'] . ". Tente novamente...');
            window.location.href = '../user_manager.php';
           </script>";
}