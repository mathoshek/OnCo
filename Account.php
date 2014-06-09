<?php

require_once 'MongoDatabase.php';
require_once 'Contact.php';

define('ACCOUNTS_DOCUMENT', 'accounts');
define('ACCOUNT_USERNAME', 'username');
define('ACCOUNT_PASSWORD', 'password');
define('ACCOUNT_EMAIL', 'email');
define('ACCOUNT_CONTACTS', 'contacts');
define('ACCOUNT_GROUPS', 'groups');

class Account
{
    private $_id;
    private $username;
    private $password;
    private $email;
    private $contacts;
    private $groups;

    static function get($username)
    {
        $mongoDb = MongoDatabase::getInstance();
        $cursor = $mongoDb->getDocument(ACCOUNTS_DOCUMENT)->find(array(ACCOUNT_USERNAME => $username));

        if ($cursor->count() != 1)
            return null;

        $doc = $cursor->getNext();

        $account = new Account();

        $account->_id = $doc['_id'];
        $account->username = $doc[ACCOUNT_USERNAME];
        $account->password = $doc[ACCOUNT_PASSWORD];
        $account->email = $doc[ACCOUNT_EMAIL];

        foreach ($doc[ACCOUNT_CONTACTS] as $contactId) {
            $account->contacts[(string)$contactId] = Contact::get($contactId);
        }

        $account->groups = $doc[ACCOUNT_GROUPS];

        return $account;
    }

    static function put($username, $password, $email)
    {
        $doc = array(
            ACCOUNT_USERNAME => $username,
            ACCOUNT_PASSWORD => $password,
            ACCOUNT_EMAIL => $email,
            ACCOUNT_CONTACTS => array(),
            ACCOUNT_GROUPS => array()
        );

        MongoDatabase::getInstance()->getDocument(ACCOUNTS_DOCUMENT)->insert($doc);
    }

    public function addContact(Contact $contact)
    {
        MongoDatabase::getInstance()->getDocument(ACCOUNTS_DOCUMENT)->update(array('_id' => new MongoId($this->_id)), array('$push' => array(ACCOUNT_CONTACTS => $contact->getId())));
        $this->contacts[(string)$contact->getId()] = $contact;
    }

    public function deleteContact(MongoId $_id)
    {
        MongoDatabase::getInstance()->getDocument(ACCOUNTS_DOCUMENT)->update(array('_id' => new MongoId($this->_id)), array('$pull' => array(ACCOUNT_CONTACTS => $_id)));
        MongoDatabase::getInstance()->getDocument(CONTACTS_DOCUMENT)->remove(array('_id' => $_id));

        unset($this->contacts[(string)$_id]);
    }

    public function getAllContacts()
    {
        return $this->contacts;
    }

    public function getContacts(ContactsFilter $filter)
    {
        $filteredContacts = array();

        foreach ($this->contacts as $contact) {
            if ($contact->matches($filter))
                array_push($filteredContacts, $contact);
        }

        return $filteredContacts;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setPassword($password)
    {
        $this->password = $password;
        MongoDatabase::getInstance()->getDocument(ACCOUNTS_DOCUMENT)->update(array('_id' => $this->_id), array(ACCOUNT_PASSWORD => $password));
    }

    function getPassword()
    {
        return $this->password;
    }

    function setEmail($email)
    {
        $this->email = $email;
        MongoDatabase::getInstance()->getDocument(ACCOUNTS_DOCUMENT)->update(array('_id' => $this->_id), array(ACCOUNT_EMAIL => $email));
    }

    function getEmail()
    {
        return $this->email;
    }
}


