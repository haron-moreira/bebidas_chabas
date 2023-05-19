<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class AtivaProduto
{
    public static function Ativar($id_produto): bool
    {
        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "UPDATE produto SET comercializado = true WHERE id_produto = :id_produto";
            $sth = $pdo->prepare($query);

            $sth->bindValue(":id_produto", $id_produto);

            $sth->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}