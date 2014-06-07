<?php

class MongoDataBase {

    var $database = "";
    var $collection = "";

    function connect() {

        $con = new MongoClient();
        $this->database = $con->newDb;
        $this->collection = $this->database->AccountUsers;
    }

    function insertData($person){

        $this->collection->insert($person);
    }

    function deleteData($person){

        $this->collection->remove($person);
    }

    function updateData($person, $personUpdate){

        $this->collection->update(array($person, array('$set'=>array($personUpdate))));
    }
}



 /*$ab = new MongoDataBase;
 $ab->connect();
$document = array(
            "LastName" => "Dan",
            "FirstName" => "Hurjui",
            "Age" => 101,
            );
 $ab->insertData($document);
 $ab->updateData();

$cursor = $ab->collection->find();

foreach ($cursor as $document) {
    echo $document["LastName"] . "\n";
    echo $document["FirstName"] . "\n";
    echo $document["Age"] . "\n";
}
$ab->deleteData();


foreach ($cursor as $document) {
    //echo $document["LastName"] . "\n";
    //echo $document["FirstName"] . "\n";
    //echo $document["Age"] . "\n";
    print_r ($document);
}
// connect to mongodb
*/