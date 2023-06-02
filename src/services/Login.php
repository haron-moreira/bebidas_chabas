<?php

namespace HaronMoreira\BebidasChabas\services;

class Login
{
    public static function Login(string $login, string $senha): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "SELECT nm_usuario, id_usuario, nv_acesso FROM usuario WHERE login_usuario = :login and senha_usuario = :senha and status = 1;";

        $sth = $conexao->prepare($query);
        $sth->bindValue(":login", $login);
        $sth->bindValue(":senha", hash("sha512", $senha));

        $sth->execute();

        if ($sth->rowCount() > 0) {
            $retorno = $sth->fetchAll(\PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['nomeUsuario'] = $retorno[0]['nm_usuario'];
            $_SESSION['id_usuario'] = $retorno[0]['id_usuario'];
            $_SESSION['nv_acesso'] = $retorno[0]['nv_acesso'];
            return true;
        }

        return false;

    }
}