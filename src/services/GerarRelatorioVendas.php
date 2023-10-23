<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class GerarRelatorioVendas
{
    public static function Gerar(): bool
    {
        try {
            $connection = ConexaoBanco::Conexao();

            $query = "Select * from venda;";

            $sth = $connection->prepare($query);
            $sth->execute();
            $vendas = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $body_relatorio = "id_venda;produto;quantidade;valor_unitario;valor_total_por_produto;data_compra;valor_compra".PHP_EOL;

            foreach ($vendas as $venda) {
                $id_venda = $venda['id_venda'];
                $dt_compra = $venda['dt_compra'];
                $valor_final_compra = $venda['valor'];

                $lista_produtos = json_decode($venda['list_produtos'], true);

                foreach ($lista_produtos as $produtos) {
                    $body_relatorio .= "$id_venda;" .
                        $produtos['name'] . ";" .
                        $produtos['quantidade'] . ";" .
                        number_format($produtos['valor_unitario'] / 100,2, ",", ".") . ";" .
                        number_format(($produtos['valor_unitario'] * $produtos['quantidade']) / 100,2, ",", ".") . ";" .
                        $dt_compra . ";" .
                        number_format($valor_final_compra / 100,2, ",", ".") .
                        PHP_EOL;

                }
            }

            file_put_contents("../files/relatorio_vendas.csv", $body_relatorio);

            return true;
        } catch (\Exception $e) {
            echo $e;
            return false;
        }
    }
}