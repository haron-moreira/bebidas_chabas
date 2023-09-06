<?php

namespace HaronMoreira\BebidasChabas\services;

class DecrementaEstoqueVenda
{
    public static function DecrementaProduto(array $produtos): bool
    {

        try {
            foreach ($produtos['produtos'] as $key => $produto) {

                    $pdo = ConexaoBanco::Conexao();

                    $query = "UPDATE produto SET qtd_estoque = qtd_estoque - :qtd_nova WHERE id_produto = :id_produto;";
                    $sth = $pdo->prepare($query);

                    $sth->bindValue(":id_produto", $key);
                    $sth->bindValue(":qtd_nova", $produto['quantidade']);

                    $sth->execute();

            }

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}