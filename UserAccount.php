<?php

//require "MongoDB.php";
//require "Contact.php";

class UserAccount {

    var $username = "";
    var $password = "";
    var $email = "";
    var $contacts = array();

    function __construct($user, $pass, $mail) {

        $this->username = $user;
       $this->password = $pass;
       $this->email = $mail;
    }

    function addContact($contact) {

        array_push($this->contacts, $contact);
    }

    function getContacts() {

        return $this->contacts;
    }
}


