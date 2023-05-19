<?php

namespace HaronMoreira\BebidasChabas\services;

class GetProdutosCompra
{
    public static function GetProduct(): string
    {
        $pdo = ConexaoBanco::Conexao();

        $query = "SELECT concat('Compra: ',id_venda) as id_venda, qtd_produto FROM venda ORDER BY dt_compra DESC LIMIT 10;";
        $sth = $pdo->prepare($query);
        $sth->execute();

        return json_encode($sth->fetchAll(\PDO::FETCH_ASSOC));

    }
}