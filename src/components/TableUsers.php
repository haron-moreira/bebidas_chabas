<?php

namespace HaronMoreira\BebidasChabas\components;

use HaronMoreira\BebidasChabas\helpers\GetEstoque;
use HaronMoreira\BebidasChabas\helpers\GetUsers;

class TableUsers
{
    public static function EchoTable(): void
    {
        $usuarios = GetUsers::GetUsers();

        foreach ($usuarios as $usuario) {

            if ($usuario['status']) {
                $status = "Ativo";
            } else {
                $status = "Inativo";
            }

            if ($usuario['nv_acesso'] <= 1) {
                $tipo = "Comum";
            } else {
                $tipo = "Admin";
            }

            echo '
            <tr>
                <th scope="row">' . $usuario['id_usuario'] . '</th>
                <td>' . $usuario['nm_usuario'] . '</td>
                <td>' . $usuario['login_usuario'] . '</td>
                <td>' . $tipo . '</td>
                <td>' . $status . '</td>
                <td>
                <div class="btn-group">
                ';
            if ($usuario['status']) {
                echo '<button type="button" data-toggle="modal" style="width: fit-content" data-target="#modal-default_2" onclick="remove(`' . $usuario['id_usuario'] . '`, `' . $usuario['nm_usuario'] . '`)" class="btn btn-danger">Desativar</button>';
            } else {
                echo '<button type="button" data-toggle="modal" style="width: fit-content" data-target="#modal-default_4" onclick="ativa(`' . $usuario['id_usuario'] . '`, `' . $usuario['nm_usuario'] . '`)" class="btn btn-success">Ativar</button>';
            }
            echo '
                    <button type="button" data-toggle="modal" style="width: fit-content" data-target="#modal-default_3" onclick="atualiza(`' . $usuario['nv_acesso'] . '`, `' . $usuario['id_usuario'] . '`, `' . $usuario['nm_usuario'] . '`)" class="btn btn-primary">Alterar</button>
                    <button type="button" data-toggle="modal" style="width: fit-content" onclick="reset_senha(`' . $usuario['id_usuario'] . '`, `' . $usuario['nm_usuario'] . '`)" class="btn btn-warning">Reset de Senha</button>
                </div>
                </td>
            </tr>';
        }
    }

}