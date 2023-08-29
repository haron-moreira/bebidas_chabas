<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class VenderViaFront
{
    public static function Vender($json_produtos)
    {
        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "INSERT INTO venda 
                VALUES (0, :qtd_itens, :itens, :valor, now())";

            $sth = $pdo->prepare($query);

            $sth->bindValue(":qtd_itens", sizeof($json_produtos['produtos']));
            $sth->bindValue(":itens", json_encode(($json_produtos['produtos'])));
            $sth->bindValue(":valor", str_replace([',','.'], "",$json_produtos['soma']));

            $sth->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}