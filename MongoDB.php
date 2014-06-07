<?php

require "UserAccount.php";

class MongoDataBase {

    protected  $database = "";
    protected  $collection = "";

    // SingletonMongoDb
    //  - bool isValidAccount(UserAccount $account);
    //  - bool createAccount(UserAccount $account);
    //  - ... getUserContacts(UserAccount $account);
    //  - ... getUserGroups(UserAccount $account);
    //  - ... getUserContacts($filter); --

    private function __construct() {

        $con = new MongoClient();
        $this->database = $con->newDb;
        $this->collection = $this->database->AccountUserss;
    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new MongoDataBase();
        }

        return $instance;
    }

    public function isValidAccount(UserAccount $account) {

    $cursor = $this->collection->find();

        foreach ($cursor as $user) {
            if($user["username"] === $account->username && $user["password"] === $account->password) {
                    return FALSE;
            }
        }
        return TRUE;
    }

    public function createAccount(UserAccount $account) {

        $this->collection->insert($account);
    }

    public function deleteAccount(UserAccount $account) {

        $this->collection->remove($account);
    }

    public function  validField($field,$value) {

        $var = TRUE;
        switch($field) {

            case "username":
                if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $value)) {
                    $var = FALSE;
                }break;

            case "password":
                if(strlen(count_chars($value, 3)) < 6) {
                    $var = FALSE;
                }break;

            case "email":
                if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $var = FALSE;
                }
            default:
        }

        return $var;
    }

    public function getUserContacts(UserAccount $account) {
        return $account->getContacts();
    }
}
