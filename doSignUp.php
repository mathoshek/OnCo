<?php

require "MongoDB.php";

$username = $_REQUEST["username"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$t = MongoDataBase::getInstance();

if(!$t->validField("username", $username))
    die("invalid username");

if(!$t->validField("password", $password))
    die("invalid password");

if(!$t->validField("username", $email))
    die("invalid email");

$account = new UserAccount($username,$password,$email);

    if($t->isValidAccount($account) === TRUE) {
            echo "account already exist!";
    }else {
            $t->createAccount($account);
    }

