<?php

namespace HaronMoreira\BebidasChabas\helpers;

use HaronMoreira\BebidasChabas\services\ConexaoBanco;
use PDO;

class GetEstoque
{

    public static function GetEstoque(): array
    {
        $pdo = ConexaoBanco::Conexao();
        $query = "SELECT * FROM produto;";
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}