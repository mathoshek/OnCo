<?php
session_start();

require_once 'Account.php';
require_once 'Contact.php';

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
            <a href="doSignOut.php">Sign Out</a>
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
        <br />
        <?php
        $account = Account::get($_SESSION['user']);

        foreach ($account->getAllContacts() as $mongoId => $contact) {
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