<?php

require_once 'Account.php';

session_start();

$account = Account::get($_SESSION['user']);
$contactId = $_GET['contactId'];

$account->deleteContact(new MongoId($contactId));

header('Location: index.php');