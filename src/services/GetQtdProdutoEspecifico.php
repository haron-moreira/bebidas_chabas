<?php

namespace HaronMoreira\BebidasChabas\services;

class GetQtdProdutoEspecifico
{
    public static function QuantoEstoqueTem($id_produto): int
    {
        $pdo = ConexaoBanco::Conexao();

        $query = "SELECT qtd_estoque FROM produto WHERE id_produto = :id_produto";
        $sth = $pdo->prepare($query);

        $sth->bindValue(":id_produto", $id_produto);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['qtd_estoque'];

    }
}