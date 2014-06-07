<?php

class Contact {

    var $firstName = "";
    var $lastName  = "";
    var $job       = "";
    var $age       = "";
    var $phoneNumber = "";
    var $hobby     = array();
    var $description = "";

    function __construct($contactName, $contactLastName) {

        $this->firstName = $contactName;
        $this->lastName = $contactLastName;
    }

    function setJob($insertJob){
        $this->job = $insertJob;
    }

    function setAge($insertAge){
        $this->age = $insertAge;
    }

    function setPhoneNumber($insertPhoneNo){
        $this->phoneNumber = $insertPhoneNo;
    }
    function setHobby($insertHobby){

        $this->hobby = $insertHobby;
    }
    function setdescription($insertDesc){
        $this->description = $insertDesc;
    }
}