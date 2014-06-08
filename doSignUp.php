<?php

require_once 'Account.php';

session_start();

$username = $_REQUEST["username"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$accountExists = Account::get($username) != null;
if ($accountExists == false) {
    Account::put($username, $password, $email);
    $_SESSION['user'] = $username;
} else
    $_SESSION['errorUsernameExists'] = 'Username exists';
header('Location: index.php');