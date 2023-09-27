<?php

namespace HaronMoreira\BebidasChabas\services;

class GerarRelatorioVendas
{
    public static function Gerar()
    {
        $connection = ConexaoBanco::Conexao();

        $query = "Select * from venda;";

        $sth = $connection->prepare($query);
        $sth->execute();
        $vendas = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $body_relatorio = "id_venda;produto;quantidade;valor_unitario;valor_total".PHP_EOL;

        foreach ($vendas as $venda) {
            $id_venda = $venda['id_venda'];
            $lista_produtos = json_decode($venda['list_produtos'], true);

            foreach ($lista_produtos as $produtos) {
                $body_relatorio .= "$id_venda;" .
                    $produtos['name'] . ";" .
                    $produtos['quantidade'] . ";" .
                    number_format($produtos['valor_unitario'] / 100,2, ",", ".") . ";" .
                    number_format(($produtos['valor_unitario'] * $produtos['quantidade']) / 100,2, ",", ".") .
                    PHP_EOL;

            }
        }

        file_put_contents("files/relatorio_vendas.csv", $body_relatorio, FILE_APPEND);

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=files/relatorio_vendas.csv");

    }
}