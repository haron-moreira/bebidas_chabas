<?php

namespace HaronMoreira\BebidasChabas\services;

class UpdateGasto
{
    public static function Update($id, $valor, $desc)
    {

        if (empty($desc)) {
            unset($desc);
        }

        if (empty($valor)) {
            unset($valor);
        }

        if (isset($desc, $valor)) {
            $query = "UPDATE faturamento SET gasto_mes = :gasto, descricao_gasto = :desc WHERE id_faturamento = :id";
            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":gasto", $valor);
            $sth->bindValue(":desc", $desc);
            $sth->bindValue(":id", $id);
            $sth->execute();

            return True;
        }

        if (isset($desc)) {
            $query = "UPDATE faturamento SET descricao_gasto = :desc WHERE id_faturamento = :id";
            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":desc", $desc);
            $sth->bindValue(":id", $id);
            $sth->execute();

            return True;
        }

        if (isset($valor)) {
            $query = "UPDATE faturamento SET gasto_mes = :gasto WHERE id_faturamento = :id";
            $pdo = ConexaoBanco::Conexao();
            $sth = $pdo->prepare($query);
            $sth->bindValue(":gasto", $valor);
            $sth->bindValue(":id", $id);
            $sth->execute();

            return True;
        }

        return False;
    }
}