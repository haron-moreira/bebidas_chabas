<?php

namespace HaronMoreira\BebidasChabas\services;

class AlteraUsuario
{
    public static function Alterar(int $id, string $nomeUsuario, string $senhaNova): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "UPDATE usuario SET nm_usuario = :nome, senha_usuario = :senha WHERE id_usuario = :id";

        try {
            $sth = $conexao->prepare($query);
            $sth->bindValue(":nome", $nomeUsuario);
            $sth->bindValue(":senha", hash("sha512", $senhaNova));
            $sth->bindValue(":id", $id);

            $sth->execute();


            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}