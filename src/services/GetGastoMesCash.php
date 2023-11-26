<?php

namespace HaronMoreira\BebidasChabas\services;

class GetGastoMesCash
{
    public static function Get()
    {
        $query = "SELECT SUM(gasto_mes / 100) as valor FROM faturamento WHERE MONTH(dt_referencia) = MONTH(curdate());";

        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['valor'];

    }
}