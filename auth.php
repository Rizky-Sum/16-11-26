<?php
session_start();

function require_login()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . login_url());
        exit();
    }
}

function login_url()
{
    $base = str_replace('\\', '/', realpath(__DIR__));
    $script = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

    if (strpos($_SERVER['SCRIPT_NAME'], '/kategori/') !== false) {
        return '../login.php';
    }

    return 'login.php';
}
