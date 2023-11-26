<?php

namespace HaronMoreira\BebidasChabas\services;

class GetSemPagamento
{
    public static function Get()
    {
        $query = "SELECT venda.id_venda as 'Venda', 
                    CONCAT('R$ ', ROUND((venda.valor / 100), 2)) as Valor, 
                    venda.qtd_produto as Produtos,  
                    date_format(venda.dt_compra, '%d/%m/%Y') as Referencia, 
                    'Não' as Pago,
                    caderneta.nm_responsavel as Responsável,
                    caderneta.tel_responsavel as Telefone,
                    caderneta.email_responsavel as Email
                    FROM venda 
                    LEFT JOIN caderneta ON venda.id_venda = caderneta.id_compra
                    WHERE venda.status_pagamento = 0 ORDER BY venda.id_venda DESC; ";
        $pdo = ConexaoBanco::Conexao();
        $sth = $pdo->prepare($query);

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}