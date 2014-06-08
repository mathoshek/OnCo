<?php

session_start();

require_once "Account.php";

$account = Account::get($_POST['username']);

if ($account == null) {
    $_SESSION['errorAccountDoesntExist'] = 'Account doesn\'t exist.';
    header('Location: login.php');
} else {
    if ($_POST['password'] == $account->getPassword()) {
        $_SESSION['user'] = $account->getUsername();
        header('Location: index.php');
    } else {
        $_SESSION['errorWrongPassword'] = 'Wrong Password';
        header('Location: login.php');
    }
}

