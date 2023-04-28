<?php

namespace HaronMoreira\BebidasChabas\services;

use HaronMoreira\BebidasChabas\entities\Venda;


class NovaVenda
{

    public static function InsertVenda(Venda $venda)
    {
        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "INSERT INTO venda VALUES (0, :qtd_produto, :list_produto, now())";
            $sth = $pdo->prepare($query);

            $sth->bindValue(":qtd_produto", $venda->getQtdProdutos());
            $sth->bindValue(":list_produto", json_encode($venda->getProdutos()));

            $sth->execute();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}