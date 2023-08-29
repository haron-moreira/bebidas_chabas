<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\services\ConexaoBanco;

class GetSearchItems
{
    public static function GetSearchItems(string $search): array
    {
        $pdo = ConexaoBanco::Conexao();

        $search = "%$search%";

        $query = "SELECT nome_produto, qtd_estoque, valor_unitario, id_produto 
                    FROM produto 
                        WHERE comercializado = 1 AND nome_produto like :search;";
        $sth = $pdo->prepare($query);
        $sth->bindValue(":search", $search);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}