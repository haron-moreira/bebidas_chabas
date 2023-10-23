<?php

namespace HaronMoreira\BebidasChabas\services;

class GetLucroSomaMesCash
{
    public static function Get()
    {
        $query = "SELECT ((SELECT SUM(valor) 
                            FROM venda 
                            WHERE MONTH(dt_compra) = MONTH(curdate())) - SUM(gasto_mes)) / 100 as valor 
                    FROM faturamento WHERE MONTH(dt_referencia) = MONTH(curdate());";

        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC)[0]['valor'];

    }
}