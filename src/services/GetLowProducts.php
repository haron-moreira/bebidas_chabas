<?php

namespace HaronMoreira\BebidasChabas\services;

class GetLowProducts
{
    public static function GetLow(): string
    {
     $pdo = ConexaoBanco::Conexao();

     $query = "SELECT nome_produto, qtd_estoque FROM produto WHERE qtd_estoque > 0 ORDER BY qtd_estoque ASC LIMIT 6;";
     $sth = $pdo->prepare($query);
     $sth->execute();

     return json_encode($sth->fetchAll(\PDO::FETCH_ASSOC));

    }
}