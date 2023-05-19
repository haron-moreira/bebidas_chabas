<?php

namespace HaronMoreira\BebidasChabas\services;

class GetLowEmail
{
    public static function GetLow(): array
    {
        $pdo = ConexaoBanco::Conexao();

        $query = "SELECT nome_produto, qtd_estoque FROM produto WHERE qtd_estoque < 10;";
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);

    }
}