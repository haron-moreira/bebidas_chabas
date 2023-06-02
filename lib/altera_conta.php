<?php

use HaronMoreira\BebidasChabas\services\AlteraUsuario;
use HaronMoreira\BebidasChabas\services\ValidaSenhaAtual;

require '../vendor/autoload.php';

$nomeUsuario = htmlspecialchars($_POST['nome_conta']);
$senha_old = htmlspecialchars($_POST['senha_old']);
$novaSenha = htmlspecialchars($_POST['novaSenha']);
$ConfirmarNovaSenha = htmlspecialchars($_POST['ConfirmarNovaSenha']);
$id = htmlspecialchars($_POST['id']);

if ($novaSenha == $ConfirmarNovaSenha) {

    if (ValidaSenhaAtual::Valida($id, $senha_old)) {
      if (AlteraUsuario::Alterar($id, $nomeUsuario, $novaSenha)) {
          session_start();
          $_SESSION['nomeUsuario'] = $nomeUsuario;
          echo "<script>
            alert('Alterações salvas.');
            window.location.href = '../my_account.php';
           </script>";
      };

        echo "<script>
            alert('Algo deu errado no momento da atualização dos dados. Tente novamente.');
            window.location.href = '../my_account.php';
           </script>";

    }

    echo "<script>
            alert('A sua senha antiga está errada. Revise e tente novamente.');
            window.location.href = '../my_account.php';
           </script>";

} else {
    echo "<script>
            alert('Os campos *Nova Senha* e *Confirmar Nova Senha* não conferem. Revise.');
            window.location.href = '../my_account.php';
           </script>";
}
