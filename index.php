<?php
session_start();

require_once 'Account.php';
require_once 'Contact.php';
require_once 'ContactsFilter.php';

if (!isset($_SESSION['user'])) {
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
            <div class="signin_button">
                <a href="login.php">Sign In</a>
            </div>
        </div>
        <div style="clear:both"></div>
    </header>
    <section id="contentLoggedOff">
        <div id="descriereLoggedOff">
            <div id="description1">
                <p>Manage your contacts.</p>

                <p>Better, easier, faster.</p>
            </div>
            <div id="description2">
                <p>OnCo is a powerful, but still easy to use, online contacts management system. Access and filter
                    information about your contacts from everywhere in a simple manner.</p>
            </div>
        </div>
        <div id="signUp">
            <form id="signUpForm" action="doSignUp.php" method="post">
                <input type="text" name="username" value="Username"/>
                <input type="email" name="email" value="Email"/>
                <input type="password" name="password" value="Password"/>
                <input type="submit" value="Sign Up"/>
            </form>
            <?php if (isset($_SESSION['errorUsernameExists'])) {
                echo "<p>" . $_SESSION['errorUsernameExists'] . "</p>";
                unset($_SESSION['errorUsernameExists']);
            }

            ?>
        </div>
    </section>
    <footer>
        <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
    </footer>
    </body>
    </html>
<?php
} else {
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
            <p></p><a href="doSignOut.php">Sign Out</a></p>
        </div>
        <div style="clear:both"></div>
    </header>
    <nav>
        <p>Meniu cu navigatie, ma gandesc ce punem aici.</p>
    </nav>
    <aside>
        <p>Aici vor aparea grupurile de contacte</p>
    </aside>
    <section id="contentLoggedIn">
        <p><a href='doAddContact.php'>Add a new Contact</a></p>
        <p><a href='filterContacts.php'>Filter Contacts</a></p>
        <br />
        <?php
        $filter = new ContactsFilter();
        if(isset($_GET['firstName']) && !empty($_GET['firstName']))
            $filter->addFirstNameFilter($_GET['firstName']);
        if(isset($_GET['lastName']) && !empty($_GET['lastName']))
            $filter->addFirstNameFilter($_GET['lastName']);
        if(isset($_GET['job']) && !empty($_GET['job']))
            $filter->addFirstNameFilter($_GET['job']);
        if(isset($_GET['birthday']) && !empty($_GET['birthday']))
            $filter->addFirstNameFilter($_GET['birthday']);
        if(isset($_GET['phoneNumber']) && !empty($_GET['phoneNumber']))
            $filter->addFirstNameFilter($_GET['phoneNumber']);
        if(isset($_GET['hobby']) && !empty($_GET['hobby']))
            $filter->addFirstNameFilter($_GET['hobby']);
        if(isset($_GET['description']) && !empty($_GET['description']))
            $filter->addFirstNameFilter($_GET['description']);
        if(isset($_GET['email']) && !empty($_GET['email']))
            $filter->addFirstNameFilter($_GET['email']);


        $account = Account::get($_SESSION['user']);

        foreach ($account->getContacts($filter) as $mongoId => $contact) {
            $name = $contact->getFirstName() . " " . $contact->getLastName();
            $phoneNumber = $contact->getPhoneNumber();
            echo "<p>$name | $phoneNumber | <a href=\"editContact.php?contactId=$mongoId\">Edit</a> | <a href=\"doDeleteContact.php?contactId=$mongoId\">Delete</a></p>";
        }
        ?>
    </section>
    <footer>
        <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
    </footer>
    </body>
    </html>
<?php
}