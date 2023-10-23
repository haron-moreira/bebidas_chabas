<?php

namespace HaronMoreira\BebidasChabas\services;


class CadastraGasto
{
    public static function Post($gasto, $caminho_arquivo, $descricao)
    {
        try {
            $query = "INSERT INTO faturamento VALUES (0, :gasto, :descricao, curdate(), :file)";

            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":gasto", $gasto);
            $sth->bindValue(":file", $caminho_arquivo);
            $sth->bindValue(":descricao", $descricao);
            $sth->execute();

            return True;
        } catch (\Exception $e) {
            return False;
        }


    }
}