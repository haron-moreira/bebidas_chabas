<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class AtualizaProduto
{
    public static function Atualizar($id_produto, $qtd_nova, $valor): bool
    {
        $valor = str_replace([",",'.'],"", $valor);

        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "UPDATE produto SET qtd_estoque = :qtd_nova, valor_unitario = :valor, dt_ultima_alteracao = now() WHERE id_produto = :id_produto;";
            $sth = $pdo->prepare($query);

            $sth->bindValue(":id_produto", $id_produto);
            $sth->bindValue(":qtd_nova", $qtd_nova);
            $sth->bindValue(":valor", $valor);

            $sth->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}