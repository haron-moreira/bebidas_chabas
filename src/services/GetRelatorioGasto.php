<?php

namespace HaronMoreira\BebidasChabas\services;

class GetRelatorioGasto
{
    public static function Get()
    {
        $query = "SELECT id_faturamento as ID, CONCAT('R$ ', ROUND((gasto_mes / 100), 2)) as 'Valor Gasto', descricao_gasto as Motivo, date_format(dt_referencia, '%M/%Y') as Referencia FROM faturamento;";
        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}