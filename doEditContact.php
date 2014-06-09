<?php

require_once 'Account.php';
session_start();

$contactId = $_GET['contactId'];
$contact = Account::get($_SESSION['user'])->getAllContacts()[$contactId];

$contact->setFirstName($_POST['firstName']);
$contact->setLastName($_POST['lastName']);
$contact->setJob($_POST['job']);
$contact->setBirthday($_POST['birthday']);
$contact->setPhoneNumber($_POST['phoneNumber']);
$contact->setDescription($_POST['description']);
$contact->setEmail($_POST['email']);

header('Location: index.php');