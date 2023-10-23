<?php

namespace HaronMoreira\BebidasChabas\services;

class GetVendasHojeCash
{
    public static function Get()
    {
        $query = "SELECT SUM(valor / 100) as valor FROM venda WHERE DAY(dt_compra) = DAY(curdate());";

        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['valor'];

    }
}