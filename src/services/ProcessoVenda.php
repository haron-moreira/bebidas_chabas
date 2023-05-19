<?php

namespace HaronMoreira\BebidasChabas\services;

use HaronMoreira\BebidasChabas\entities\Venda;

class ProcessoVenda
{
    public static function ProcessoVenda(Venda $venda): bool
    {
        if (NovaVenda::InsertVenda($venda)) {
            return DecrementaEstoqueVenda::DecrementaProduto($venda->getProdutos());
        };

        return false;


    }
}