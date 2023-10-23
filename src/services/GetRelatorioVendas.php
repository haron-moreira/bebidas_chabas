<?php

namespace HaronMoreira\BebidasChabas\services;

class GetRelatorioVendas
{
    public static function Get()
    {
        $query = "SELECT id_venda as 'Venda', CONCAT('R$ ', ROUND((valor / 100), 2)) as Valor, qtd_produto as Produtos,  date_format(dt_compra, '%M/%Y') as Referencia FROM venda; ";
        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}