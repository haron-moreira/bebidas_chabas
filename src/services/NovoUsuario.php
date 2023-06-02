<?php

namespace HaronMoreira\BebidasChabas\services;

class NovoUsuario
{
    public static function InserirNovo($login, $nome, $senha, $nv_acesso, $status): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "INSERT INTO usuario 
                VALUES (0, :nome, :login, :senha, :nv_acesso, :status)";

        try {
            $sth = $conexao->prepare($query);
            $sth->bindValue(":nome", $nome);
            $sth->bindValue(":login", $login);
            $sth->bindValue(":senha", $senha);
            $sth->bindValue(":nv_acesso", $nv_acesso);
            $sth->bindValue(":status", $status, \PDO::PARAM_BOOL);

            $sth->execute();


            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}