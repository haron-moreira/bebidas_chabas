<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\helpers\GetEstoque;

class DualListItems
{
    public static function DuallListItems(): void
    {
        $produtos = GetEstoque::GetEstoque();

        foreach ($produtos as $produto) {
            echo "<option onmouseup='valor(this)' value=".$produto['valor_unitario']." id=".$produto['id_produto'].">".$produto['nome_produto']."</option>";
        }
    }
}