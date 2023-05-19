<?php

namespace HaronMoreira\BebidasChabas\services;

class Contador
{
    public static function getVendasHoje(): int
    {
        $conexao = ConexaoBanco::Conexao();
        $query = "SELECT count(*) as contagem FROM venda WHERE date_format(dt_compra, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d');";

        $sth = $conexao->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['contagem'];
    }

    public static function getQtdTotalProdutos(): int
    {
        $conexao = ConexaoBanco::Conexao();
        $query = "SELECT count(*) as contagem FROM produto;";

        $sth = $conexao->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['contagem'];
    }

    public static function getPoucoEstoque(): int
    {
        $conexao = ConexaoBanco::Conexao();
        $query = "SELECT count(*) as contagem FROM produto WHERE qtd_estoque < 20;";

        $sth = $conexao->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['contagem'];
    }

    public static function getSemEstoque(): int
    {
        $conexao = ConexaoBanco::Conexao();
        $query = "SELECT count(*) as contagem FROM produto WHERE qtd_estoque = 0;";

        $sth = $conexao->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['contagem'];
    }

    public static function getMaisVendidos(): int
    {
        $conexao = ConexaoBanco::Conexao();
        $query = "SELECT count(*) as contagem FROM produto WHERE qtd_estoque = 0;";

        $sth = $conexao->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['contagem'];
    }

}