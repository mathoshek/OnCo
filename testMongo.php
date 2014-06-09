<?php

require_once "Contact.php";
require_once "ContactsFilter.php";

$test  = new Account();
$con1 = new Contact($test);

$con1->setFirstName("Sandru");
$con1->setLastName("Adrian");
$con1->setBirthday("10-07-1990");
$con1->setEmail("adrian@sandru.com");
$con1->setHobby("pescar");
$con1->setPhoneNumber("0752064859");
$con1->setJob("programator");


$conFil = new ContactsFilter();

$conFil->addLastNameFilter($con1->getLastName());
$con1->matches($conFil);
$conFil->addFirstNameFilter($con1->getFirstName());
$con1->matches($conFil);
$conFil->addBirthdayFilter($con1->getBirthday());
$con1->matches($conFil);
$conFil->addEmailFilter($con1->getEmail());
$con1->matches($conFil);
$conFil->addHobbyFilter($con1->getHobby());
$con1->matches($conFil);
$conFil->addPhoneNumberFilter($con1->getPhoneNumber());
$con1->matches($conFil);
$conFil->addJobFilter($con1->getJob());
$con1->matches($conFil);