<?php

require_once 'MongoDatabase.php';

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

        if ($cursor->count() == 0)
            return null;

        $doc = $cursor->getNext();

        $account = new Account();

        $account->_id = $doc['_id'];
        $account->username = $doc[ACCOUNT_USERNAME];
        $account->password = $doc[ACCOUNT_PASSWORD];
        $account->email = $doc[ACCOUNT_EMAIL];
        $account->contacts = $doc[ACCOUNT_CONTACTS];
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

    public function createContact()
    {
        $contact = new Contact(this);
        $contact->setFirstName("");

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


