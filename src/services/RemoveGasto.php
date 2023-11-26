<?php

namespace HaronMoreira\BebidasChabas\services;

class RemoveGasto
{
    public static function Delete($id)
    {
        try {
            $query = "DELETE FROM faturamento WHERE id_faturamento = :id";

            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":id", htmlspecialchars($id));
            $sth->execute();

            return True;
        } catch (\Exception $e) {
            return false;
        }

    }
}