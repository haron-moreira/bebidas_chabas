<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\helpers\GetEstoque;

class TableEstoque
{

    public static function EchoTable(): void
    {
        $produtos = GetEstoque::GetEstoque();

        foreach ($produtos as $produto) {
            echo '
            <tr>
                <th scope="row">'.$produto['id_produto'].'</th>
                <td>'.$produto['nome_produto'].'</td>
                <td>'.$produto['fabricante'].'</td>
                <td>'.$produto['qtd_estoque'].'</td>
            </tr>';
        }

    }


}