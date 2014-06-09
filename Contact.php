<?php

require_once 'MongoDatabase.php';

define('CONTACT_FIRST_NAME', 'firstName');
define('CONTACT_LAST_NAME', 'lastName');
define('CONTACT_JOB', 'job');
define('CONTACT_BIRTHDAY', 'birthday');
define('CONTACT_PHONE_NUMBER', 'phoneNumber');
define('CONTACT_HOBBY', 'hobby');
define('CONTACT_DESCRIPTION', 'description');
define('CONTACT_EMAIL', 'email');

class Contact
{
    private $firstName;
    private $lastName;
    private $job;
    private $birthday;
    private $phoneNumber;
    private $hobby;
    private $description;
    private $email;

    private $account;

    public function matches(ContactsFilter $filter)
    {
        // Cod de filtru
        // returneaza true sau false
    }

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getHobby()
    {
        return $this->hobby;
    }

    public function setHobby($hobby)
    {
        $this->hobby = $hobby;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}