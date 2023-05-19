<?php

namespace HaronMoreira\BebidasChabas\services;

class SessionValidate
{
    public static function Validar(): bool
    {
        session_start();

        if (!isset($_SESSION['login'])) {
            return false;
        }
        return true;
    }
}