<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\helpers\GetEstoque;

class TableEstoque
{

    public static function EchoTable(): void
    {
        $produtos = GetEstoque::GetEstoque();

        foreach ($produtos as $produto) {

            if ($produto['comercializado']) {
                $comercializado = "Sim";
            } else {
                $comercializado = "Não";
            }

            echo '
            <tr>
                <th scope="row">'.$produto['id_produto'].'</th>
                <td>'.$produto['nome_produto'].'</td>
                <td>'.$produto['qtd_volume'].' '.$produto['tipo_volume'].'</td>
                <td>'.$produto['fabricante'].'</td>
                <td>'.$produto['qtd_estoque'].'</td>
                <td>'.$comercializado.'</td>
                <td>
                <div class="btn-group">
                ';
                if ($produto['comercializado']) {
                    echo '<button type="button" data-toggle="modal" style="width: 8vw" data-target="#modal-default_2" onclick="remove(`'.$produto['id_produto'].'`, `'.$produto['nome_produto'].'`)" class="btn btn-danger">Desativar</button>';
                } else {
                    echo '<button type="button" data-toggle="modal" style="width: 8vw" data-target="#modal-default_4" onclick="ativa(`'.$produto['id_produto'].'`, `'.$produto['nome_produto'].'`)" class="btn btn-success">Ativar</button>';
                }
                echo '
                    <button type="button" data-toggle="modal" style="width: 8vw" data-target="#modal-default_3" onclick="atualiza(`'.$produto['qtd_estoque'].'`, `'.$produto['id_produto'].'`, `'.$produto['nome_produto'].'`)" class="btn btn-info">Atualizar</button>
                </div>
                </td>
            </tr>';
        }

    }


}