<?php

require_once 'MongoDatabase.php';

define('CONTACTS_DOCUMENT', 'contacts');
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
    private $_id;
    private $firstName;
    private $lastName;
    private $job;
    private $birthday;
    private $phoneNumber;
    private $hobby;
    private $description;
    private $email;

    public static function createContact(Account $account)
    {
        $contactArray = array(
            CONTACT_FIRST_NAME => "",
            CONTACT_LAST_NAME => "",
            CONTACT_JOB => "",
            CONTACT_BIRTHDAY => "",
            CONTACT_PHONE_NUMBER => "",
            CONTACT_DESCRIPTION => "",
            CONTACT_EMAIL => "",
            CONTACT_HOBBY => ""
        );

        $ok = MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->insert($contactArray);

        if ($ok == false)
            die('insert false');

        $contact = Contact::get($contactArray['_id']);

        if ($contact == null)
            die('naspa');

        $account->addContact($contact);

        return $contact;
    }

    public static function get(MongoId $_id)
    {
        $doc = MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->findOne(array('_id' => $_id));

        $contact = new Contact();
        $contact->_id = $doc['_id'];
        $contact->firstName = $doc[CONTACT_FIRST_NAME];
        $contact->lastName = $doc[CONTACT_LAST_NAME];
        $contact->job = $doc[CONTACT_JOB];
        $contact->birthday = $doc[CONTACT_BIRTHDAY];
        $contact->phoneNumber = $doc[CONTACT_PHONE_NUMBER];
        $contact->description = $doc[CONTACT_DESCRIPTION];
        $contact->email = $doc[CONTACT_EMAIL];
        $contact->hobby = $doc[CONTACT_HOBBY];

        return $contact;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function matches(ContactsFilter $filter)
    {
        $ret = true;
        foreach ($filter->getFilters() as $key => $filterVal) {
            if (strpos(strtolower($this->$key), strtolower($filterVal)) !== false) {
                $ret = $ret && true;
            } else {
                $ret = $ret && false;
            }
        }
        return $ret;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_FIRST_NAME => $firstName)));
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_LAST_NAME => $lastName)));
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_JOB => $job)));
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_BIRTHDAY => $birthday)));
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_PHONE_NUMBER => $phoneNumber)));
    }

    public function getHobby()
    {
        return $this->hobby;
    }

    public function setHobby($hobby)
    {
        $this->hobby = $hobby;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_HOBBY => $hobby)));
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_DESCRIPTION => $description)));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->update(array('_id' => $this->_id), array('$set' => array(CONTACT_EMAIL => $email)));
    }
}