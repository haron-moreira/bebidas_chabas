<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class DesativaProduto
{
    public static function Desativar($id_produto): bool
    {
        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "UPDATE produto SET comercializado = false WHERE id_produto = :id_produto";
            $sth = $pdo->prepare($query);

            $sth->bindValue(":id_produto", $id_produto);

            $sth->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}