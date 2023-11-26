<?php

namespace HaronMoreira\BebidasChabas\services;

class FaturamentoDados
{
    public static function Get()
    {
        $query = "SELECT id_faturamento, date_format(dt_referencia, '%d/%m/%Y') as Data, gasto_mes / 100 as gasto, 
                    descricao_gasto, caminho_foto_nota 
                    FROM faturamento WHERE MONTH(dt_referencia) = MONTH(CURDATE()) order by id_faturamento DESC";

        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}