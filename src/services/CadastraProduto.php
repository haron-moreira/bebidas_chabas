<?php

namespace HaronMoreira\BebidasChabas\services;

use HaronMoreira\BebidasChabas\entities\Produto;
use PHPMailer\PHPMailer\Exception;

class CadastraProduto
{

    public static function Cadastrar(Produto $produto): bool
    {
        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "INSERT INTO produto 
                VALUES (0, :nome, :fabricante, :tipo_volume, :qtd_volume, :qtd_estoque, :status, now(), now())";
            $sth = $pdo->prepare($query);

            $sth->bindValue(":nome", $produto->getNome());
            $sth->bindValue(":fabricante", $produto->getFabricante());
            $sth->bindValue(":tipo_volume", $produto->getTipoVolume());
            $sth->bindValue(":qtd_volume", $produto->getQuantidade());
            $sth->bindValue(":qtd_estoque", $produto->getQtdEmEstoque());
            $sth->bindValue(":status", $produto->getStatus(), \PDO::PARAM_BOOL);

            $sth->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }


    }

}