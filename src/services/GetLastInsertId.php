<?php

namespace HaronMoreira\BebidasChabas\services;

class GetLastInsertId
{
    public static function Get()
    {
        $con = ConexaoBanco::Conexao();

        $query = "SELECT id_venda FROM venda order by id_venda DESC limit 1";

        $sth = $con->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['id_venda'];

    }
}