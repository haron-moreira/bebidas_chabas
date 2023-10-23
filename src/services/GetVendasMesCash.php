<?php

namespace HaronMoreira\BebidasChabas\services;

class GetVendasMesCash
{
    public static function Get()
    {
        $query = "SELECT SUM(valor / 100) as valor FROM venda WHERE MONTH(dt_compra) = MONTH(curdate());";

        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['valor'];

    }
}