<?php

namespace HaronMoreira\BebidasChabas\services;

class AlteraUsuarioViaAdmin
{
    public static function Alterar($nomeUsuario, $nv_acesso, $id): bool
    {
        $conexao = ConexaoBanco::Conexao();

        $query = "UPDATE usuario SET nm_usuario = :nome, nv_acesso = :nv_acesso WHERE id_usuario = :id";

        try {
            $sth = $conexao->prepare($query);
            $sth->bindValue(":nome", $nomeUsuario);
            $sth->bindValue(":nv_acesso", $nv_acesso);
            $sth->bindValue(":id", $id);

            $sth->execute();


            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}