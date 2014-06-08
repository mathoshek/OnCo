<?php

class Contact {

    var $firstName   = "";
    var $lastName    = "";
    var $job         = "";
    var $age         = "";
    var $phoneNumber = "";
    var $hobby       = "";
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

    function getFieldValue($key) {

        $ret = "";
        switch($key) {
            case 'fisrtName':   $ret = $this->firstName;break;
            case 'lastName':    $ret = $this->lastName;break;
            case 'job':         $ret = $this->job;break;
            case 'age':         $ret = $this->age;break;
            case 'phoneNumber': $ret = $this->phoneNumber;break;
            case 'hobby':       $ret = $this->hobby;break;
        }
        return $ret;
    }


}