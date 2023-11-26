<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\Exception;

class VenderViaFront
{
    public static function Vender($json_produtos, $pagamento_posterior, $dados): bool
    {
        $qtd = 0;
        foreach ($json_produtos['produtos'] as $produto) {
            $qtd += $produto['quantidade'];
        }

        try {
            $pdo = ConexaoBanco::Conexao();

            $query = "INSERT INTO venda 
                VALUES (0, :qtd_itens, :itens, :valor, now(), :pagamento)";

            $sth = $pdo->prepare($query);

            $sth->bindValue(":qtd_itens", $qtd);
            $sth->bindValue(":itens", json_encode(($json_produtos['produtos'])));
            $sth->bindValue(":valor", str_replace([',','.'], "",$json_produtos['soma']));
            $sth->bindValue(":pagamento", $pagamento_posterior, \PDO::PARAM_BOOL);

            $sth->execute();

            DecrementaEstoqueVenda::DecrementaProduto($json_produtos);
            error_log(json_encode($dados));

            if ($pagamento_posterior == 0) {
                $id = $pdo->lastInsertId();

                $query = "INSERT INTO caderneta 
                VALUES (0, :id_compra, :nome, :email, :telefone)";

                $sth = $pdo->prepare($query);

                $sth->bindValue(":id_compra", $id);
                $sth->bindValue(":nome", $dados['nome']);
                $sth->bindValue(":email", $dados['email']);
                $sth->bindValue(":telefone", $dados['tel']);

                $sth->execute();
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}