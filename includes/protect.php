<?php
if (empty($_COOKIE['gambee_password']) || $_COOKIE['gambee_password'] !== $password) {
    header('Location: login.php');
    exit;
}
?>