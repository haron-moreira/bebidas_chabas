<?php

namespace HaronMoreira\BebidasChabas\services;

class DesativaUsuario
{
    public static function Desativar($id): bool
    {
        try {
            $conexao = ConexaoBanco::Conexao();

            $query = "UPDATE usuario SET status = 0 WHERE id_usuario = :id;";

            $sth = $conexao->prepare($query);
            $sth->bindValue(":id", $id);

            $sth->execute();

            return true;

        } catch (\Exception $e) {
            die($e);
            return false;
        }
    }
}