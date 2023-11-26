<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\services\GetSemPagamento;

class TableCaderneta
{
    public static function EchoTable(): void
    {
        $vendas_nao_paga = GetSemPagamento::Get();

        foreach ($vendas_nao_paga as $venda) {

            echo '
            <tr>
                <th scope="row">' . $venda['Venda'] . '</th>
                <td>' . $venda['Valor'] . '</td>
                <td>' . $venda['Produtos'] . '</td>
                <td>' . $venda['Referencia'] . '</td>
                <td>' . $venda['Pago'] . '</td>
                <td>' . $venda['Responsável'] . '</td>
                <td>' . $venda['Telefone'] . '</td>
                <td>' . $venda['Email'] . '</td>
                <td>
                <div class="btn-group">
                ';

            echo '
                    <button onclick="pagar(`'.$venda['Venda'].'`)" type="button" style="width: fit-content" class="btn btn-primary">Pagamento Realizado</button>
                </div>
                </td>
            </tr>';
        }
    }
}