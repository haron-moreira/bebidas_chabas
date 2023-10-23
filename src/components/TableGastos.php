<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\services\FaturamentoDados;

class TableGastos
{
    public static function Table()
    {
        $dados = FaturamentoDados::Get();

        foreach ($dados as $dado) {
            $foto = str_replace('\\', '/', $dado['caminho_foto_nota']);

            echo
            '<tr>
                <th>'.$dado['id_faturamento'].'</th>
                <td>'.$dado['Data'].'</td>
                <th>'.$dado['descricao_gasto'].'</th>
                <td>R$ '.number_format($dado['gasto'], 2, ",", ".").'</td>
                <td>
                    <div class="btn-group">
                        <button type="button" data-toggle="modal" class="btn btn-info"
                        onclick="if (confirm(`Tem certeza que deseja apagar este registro?`)) {
                            location.href = `/api/remove.php?id='.$dado['id_faturamento'].'`
                        }"
                        >
                        <span class="fas fa-times fa-align-center">
                        </button>
                        <button type="button" data-toggle="modal" data-target="#modal-default_3" class="btn btn-info"
                        onclick="formdata(`'.$dado['id_faturamento'].'`)"
                        >
                        <span class="fas fa-pen fa-align-center">
                        </button>
                        <button type="button" data-toggle="modal" class="btn btn-info"
                        onclick="window.open(`/img/uploads/'.$foto.'` , `_blank`)"
                        >
                        <span class="fas fa-eye fa-align-center">
                        </button>
                    </div>
                </td>
            </tr>';

        }
    }
}