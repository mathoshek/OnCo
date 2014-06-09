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
        $ret = TRUE;
        foreach($filter->getFilters() as $key => $filterVal) {

                switch($key){

                    case CONTACT_FIRST_NAME:
                        if(CONTACT_FIRST_NAME === $key && strcmp(strtolower($this->$key),strtolower($filterVal))===0 && $ret === TRUE)
                            $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_LAST_NAME:
                        if(CONTACT_LAST_NAME === $key && strcmp(strtolower($this->$key),strtolower($filterVal))===0 )
                            $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_JOB:
                        if(CONTACT_JOB === $key && strcmp(strtolower($this->$key),strtolower($filterVal))===0 )
                           $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_BIRTHDAY:
                        if(CONTACT_BIRTHDAY === $key && strcmp($this->$key,strtolower($filterVal))===0 )
                            $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_HOBBY:
                        if(CONTACT_HOBBY === $key && strcmp($this->$key,strtolower($filterVal))===0 )
                           $ret = TRUE;
                        else
                            $ret = FALSE;
                       break;

                    case CONTACT_EMAIL:
                        if(CONTACT_EMAIL === $key && strpos($this->$key, $filterVal))
                            $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_DESCRIPTION:
                        if(CONTACT_DESCRIPTION === $key && strpos($this->$key, $filterVal))
                            $ret = TRUE;
                        else
                            $ret = FALSE;
                        break;

                    case CONTACT_PHONE_NUMBER:
                        if(CONTACT_PHONE_NUMBER === $key && is_numeric($filterVal))
                           $ret = TRUE;
                        else
                            $ret = FALSE;
                      break;
                }

        }
        return $ret;
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