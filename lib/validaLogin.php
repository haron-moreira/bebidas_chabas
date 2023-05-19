<?php


use HaronMoreira\BebidasChabas\services\Login;

require '../vendor/autoload.php';

if (Login::Login($_POST['inputUser'], $_POST['inputPassword'])) {
    session_start();
    $_SESSION['login'] = true;
    header('location: ../index.php');
} else {
    echo "<script>alert('Usuário e/ou senha incorreto');window.location.href = '../login.php';</script>";
}