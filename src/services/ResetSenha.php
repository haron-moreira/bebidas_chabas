<?php

namespace HaronMoreira\BebidasChabas\services;

class ResetSenha
{
    public static function Reset($senha, $id): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "UPDATE usuario SET senha_usuario = :senha WHERE id_usuario = :id";

        try {
            $sth = $conexao->prepare($query);
            $sth->bindValue(":senha", hash('sha512', $senha));
            $sth->bindValue(":id", $id);


            $sth->execute();


            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}