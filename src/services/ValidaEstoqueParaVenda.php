<?php

namespace HaronMoreira\BebidasChabas\services;

class ValidaEstoqueParaVenda
{
    public static function TemEstoque($id_produto, $qtd): bool
    {
        $pdo = ConexaoBanco::Conexao();

        $query = "SELECT qtd_estoque FROM produto WHERE id_produto = :id_produto";
        $sth = $pdo->prepare($query);

        $sth->bindValue(":id_produto", $id_produto);
        $sth->execute();
        $qtd_estoque = $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['qtd_estoque'];

        if ($qtd_estoque < $qtd) {
            return false;
        }

        return true;

    }
}