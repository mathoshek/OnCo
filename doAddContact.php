<?php

require_once 'Account.php';

session_start();

$account = Account::get($_SESSION['user']);
$contact = Contact::createContact($account);

$contactId = $contact->getId();

header("Location: editContact.php?contactId=$contactId");