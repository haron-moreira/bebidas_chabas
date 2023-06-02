<?php

namespace HaronMoreira\BebidasChabas\services;

class ValidaSenhaAtual
{
    public static function Valida(int $id, string $senha): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "SELECT id_usuario FROM usuario WHERE id_usuario = :id and senha_usuario = :senha;";

        $sth = $conexao->prepare($query);
        $sth->bindValue(":id", $id);
        $sth->bindValue(":senha", hash("sha512", $senha));

        $sth->execute();

        if ($sth->rowCount() > 0) {
            return true;
        }
        return false;
    }
}