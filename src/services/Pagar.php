<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class Pagar
{
    public static function RegistrarPagamento($id): bool
    {
        try {
            $query = "UPDATE venda SET status_pagamento = b'1' WHERE id_venda = :id";

            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":id", $id);
            $sth->execute();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}