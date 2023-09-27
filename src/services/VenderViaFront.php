<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class VenderViaFront
{
    public static function Vender($json_produtos): bool
    {
        $qtd = 0;
        foreach ($json_produtos['produtos'] as $produto) {
            $qtd += $produto['quantidade'];
        }

        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "INSERT INTO venda 
                VALUES (0, :qtd_itens, :itens, :valor, now())";

            $sth = $pdo->prepare($query);

            $sth->bindValue(":qtd_itens", $qtd);
            $sth->bindValue(":itens", json_encode(($json_produtos['produtos'])));
            $sth->bindValue(":valor", str_replace([',','.'], "",$json_produtos['soma']));

            $sth->execute();

            DecrementaEstoqueVenda::DecrementaProduto($json_produtos);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}