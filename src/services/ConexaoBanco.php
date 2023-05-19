<?php

namespace HaronMoreira\BebidasChabas\services;

//use PDO;

class ConexaoBanco
{
    public static function Conexao(): \PDO
    {
        $database = "bebidas_chabas";
        $password = "nova_senha";
        $hostname = "localhost";
        $username = "root";

        return new \PDO("mysql:host=$hostname; dbname=$database; charset=utf8mb4;", "$username", "$password");
    }


}
