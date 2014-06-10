<?php

require_once 'Account.php';

session_start();

$contactId = $_GET['contactId'];
$account = Account::get($_SESSION['user']);
$contacts = $account->getAllContacts();
$contact = $contacts[$contactId];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OnCo</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
    <div id="logo">OnCo</div>
    <div id="user_control">
        <div class="signout_button">
            <a href="doSignOut.php">Sign Out</a>
        </div>
    </div>
    <div style="clear:both"></div>
</header>
<section id="contentLoggedIn" style="margin-left: 0; padding:20px;">
    <form action="doEditContact.php?contactId=<?php echo $contactId ?>" method="POST">
        <table style="margin:0 auto">
            <tr>
                <td><label for="input0">First name:</label></td>
                <td><input id="input0" type="text" name="firstName" value="<?php echo $contact->getFirstName(); ?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="input1">Last name:</label></td>
                <td><input id="input1" type="text" name="lastName" value="<?php echo $contact->getLastName(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input2">Job:</label></td>
                <td><input id="input2" type="text" name="job" value="<?php echo $contact->getJob(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input3">Birthday:</label></td>
                <td><input id="input3" type="text" name="birthday" value="<?php echo $contact->getBirthday(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input4">Phone number:</label></td>
                <td><input id="input4" type="text" name="phoneNumber"
                           value="<?php echo $contact->getPhoneNumber(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input5">Hobby:</label></td>
                <td><input id="input5" type="text" name="hobby" value="<?php echo $contact->getHobby(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input6">Description:</label></td>
                <td><input id="input6" type="text" name="description"
                           value="<?php echo $contact->getDescription(); ?>"/></td>
            </tr>
            <tr>
                <td><label for="input7">Email:</label></td>
                <td><input id="input7" type="text" name="email" value="<?php echo $contact->getEmail(); ?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit" style="width:100%"/></td>
            </tr>
        </table>
    </form>
</section>
<footer>
    <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
</footer>
</body>
</html>