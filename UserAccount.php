<?php

//require "MongoDB.php";
//require "Contact.php";

class UserAccount {

    var $username = "";
    var $password = "";
    var $email = "";
    var $contacts = array();

    function __construct($user, $pass, $mail) {

        $this->username = $user;
       $this->password = $pass;
       $this->email = $mail;
    }

    function addContact($contact) {

        array_push($this->contacts, $contact);
    }
}


/*teste*/
/*$ab = new MongoDataBase;
$ab->connect();

for($index = 0; $index < 10; $index++)
{
    $user1 = new UserAccount("Adrian" . $index,"md5","adrian@yahoo.com");
    $ab->insertData($user1);

    $con = new Contact("Dan" . $index,"Hurjui");
    $user1->addContact($con);
}

$cursor = $ab->collection->find();
foreach($cursor as $findIndex){

    print_r($findIndex['username']) . PHP_EOL;
    print_r($findIndex['password']) . PHP_EOL;
    print_r($findIndex['email']) . PHP_EOL;
    //$test = $findIndex['contacts'];
   // print_r($test['firstNmae']) . PHP_EOL;

}

foreach($cursor as $findIndex){
    $ab->deleteData($findIndex);
}
*/

