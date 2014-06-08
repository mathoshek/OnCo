<?php

require_once "Account.php";

class MongoDatabase
{
    protected $mongoDbClient;
    protected $db;

    private function __construct()
    {
        $this->mongoDbClient = new MongoClient();
        $this->db = $this->mongoDbClient->OnCoDatabase;
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new MongoDatabase();
        }
        return $instance;
    }

    public function getDocument($documentName)
    {
        return $this->db->$documentName;
    }
}
