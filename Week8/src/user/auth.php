<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_name'])) {
    header("Location: /login.php");
    exit;
}

function check_admin()
{
    if ($_SESSION['role_name'] !== 'admin') {

        header("Location: /user_homepage.php");
        exit;
    }
}

function check_employee()
{
    if ($_SESSION['role_name'] !== 'employee') {
        header("Location: ../admin/admin_homepage.php");
        exit;
    }
}
