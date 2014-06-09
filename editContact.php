<?php

require_once 'Account.php';

session_start();

$contactId = $_GET['contactId'];
echo $contactId . '<br />';
$account = Account::get($_SESSION['user']);
$contacts = $account->getAllContacts();
$contact = $contacts[$contactId];
?>

<form action="doEditContact.php?contactId=<?php echo $contactId ?>" method="POST">
    <input type="text" name="firstName" value="<?php echo $contact->getFirstName(); ?>"/><br/>
    <input type="text" name="lastName" value="<?php echo $contact->getLastName(); ?>"/><br/>
    <input type="text" name="job" value="<?php echo $contact->getJob(); ?>"/><br/>
    <input type="text" name="birthday" value="<?php echo $contact->getBirthday(); ?>"/><br/>
    <input type="text" name="phoneNumber" value="<?php echo $contact->getPhoneNumber(); ?>"/><br/>
    <input type="text" name="hobby" value="<?php echo $contact->getHobby(); ?>"/><br/>
    <input type="text" name="description" value="<?php echo $contact->getDescription(); ?>"/><br/>
    <input type="text" name="email" value="<?php echo $contact->getEmail(); ?>"/><br/>
    <input type="submit" value="Submit"/>
</form>