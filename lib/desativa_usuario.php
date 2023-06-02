<?php

use HaronMoreira\BebidasChabas\services\DesativaUsuario;

require '../vendor/autoload.php';

if (DesativaUsuario::Desativar(htmlspecialchars($_POST['id_usuario_remove']))) {
    echo "<script>
            alert('Usuário ". $_POST['nome_usuario_remove'] . " desativado com sucesso.');
            window.location.href = '../user_manager.php';
           </script>";
} else {
    echo "<script>
            alert('Falha ao desativar usuário: ". $_POST['nome_usuario_remove'] . ". Tente novamente...');
            window.location.href = '../user_manager.php';
           </script>";
}
