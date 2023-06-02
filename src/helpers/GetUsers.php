<?php

namespace HaronMoreira\BebidasChabas\helpers;

use HaronMoreira\BebidasChabas\services\ConexaoBanco;

class GetUsers
{
    public static function GetUsers(): array
    {
        $pdo = ConexaoBanco::Conexao();
        $query = "SELECT * FROM usuario;";
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}