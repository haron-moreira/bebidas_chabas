<?php

namespace HaronMoreira\BebidasChabas\services;

class AtivaUsuario
{
    public static function Ativar($id): bool
    {
        try {
            $conexao = ConexaoBanco::Conexao();

            $query = "UPDATE usuario SET status = 1 WHERE id_usuario = :id;";

            $sth = $conexao->prepare($query);
            $sth->bindValue(":id", $id);

            $sth->execute();

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}