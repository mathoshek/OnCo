<?php


require "UserAccount.php";
require "Contact.php";

$account = new UserAccount("add","md5","a@aa");

$contact = new Contact("Adrian","Sandru");
$contact->age = 10;
$account->addContact($contact);

$contact = new Contact("Ciprian","Sandru");
$contact->age = 10;
$account->addContact($contact);

$contact = new Contact("Adrian","Mihalache");
$contact->age = 10;
$account->addContact($contact);

$contact = new Contact("Ciprian","Mihalache");
$contact->age = 10;
$account->addContact($contact);

$contact = new Contact("Dan","Hurjui");
$contact->age = 10;
$account->addContact($contact);

$contact = new Contact("Vlad","Popa");
$contact->age = 20;
$account->addContact($contact);

$etichete = array(
    "firstName" => 0,
    "lastName" => 1,
    "job" => 2,
    "age" => 3,
    "phoneNumber" => 4,
    "hobby" => 5
);

 $data=array();
if(isset($_REQUEST['submit']))
{
    //daca am selectat
    if(isset($_REQUEST['check'])) {
        foreach($_REQUEST['check'] as $checked)
            $data[$checked] = $_REQUEST[$checked];
    }
    else
        echo $message = 'Trebuie sa selectati macar un camp.';

    if (isset($_REQUEST['check'])) {

        //parcurgem toate valorile selectate
        $contacts = $account->getContacts();
        $filtredContacts = array();

        foreach ($contacts as $con) {

            $ok = 0;
            foreach($data as $key=>$value) {

                if($value === '') {
                    $message = 'V&#259; rug&#259;m s&#259; completa&#355;i toate c&#226;mpurile selectate.';
                    break;
                }

                echo '<pre>';
                print_r($key);
                echo '</pre>';

                $val = strtolower($val);
                $value = strtolower($value);
                if( strcmp($val,$value)!==0)
                    $ok = 1;
            }
            if( $ok === 0 )
                array_push($filtredContacts,$con);

        }

    }
        echo '<pre>';
        print_r($filtredContacts);
        echo '</pre>';

}
