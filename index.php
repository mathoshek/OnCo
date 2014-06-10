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
            <div class="signout_button">
                <a href="doSignOut.php">Sign Out</a>
            </div>
        </div>
        <div style="clear:both"></div>
    </header>
    <aside>
        <p class="button"><a href='doAddContact.php'>Add a new Contact</a></p>
        <p class="button"><a href='filterContacts.php'>Filter Contacts</a></p>
    </aside>
    <section id="contentLoggedIn">
        <table style="width:100%;">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job</th>
                <th>Birthday</th>
                <th>Phone Number</th>
                <th>Hobby</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            $filter = new ContactsFilter();
            if (isset($_GET['firstName']) && !empty($_GET['firstName']))
                $filter->addFirstNameFilter($_GET['firstName']);
            if (isset($_GET['lastName']) && !empty($_GET['lastName']))
                $filter->addLastFilter($_GET['lastName']);
            if (isset($_GET['job']) && !empty($_GET['job']))
                $filter->addJobFilter($_GET['job']);
            if (isset($_GET['birthday']) && !empty($_GET['birthday']))
                $filter->addBirthdayFilter($_GET['birthday']);
            if (isset($_GET['phoneNumber']) && !empty($_GET['phoneNumber']))
                $filter->addPhoneNumberFilter($_GET['phoneNumber']);
            if (isset($_GET['hobby']) && !empty($_GET['hobby']))
                $filter->addHobbyFilter($_GET['hobby']);
            if (isset($_GET['description']) && !empty($_GET['description']))
                $filter->addDescriptionFilter($_GET['description']);
            if (isset($_GET['email']) && !empty($_GET['email']))
                $filter->addEmailFilter($_GET['email']);


            $account = Account::get($_SESSION['user']);

            foreach ($account->getContacts($filter) as $mongoId => $contact) {
                $firstName = $contact->getFirstName();
                $lastName = $contact->getLastName();
                $job = $contact->getJob();
                $birthday = $contact->getBirthday();
                $phoneNumber = $contact->getPhoneNumber();
                $hobby = $contact->getHobby();
                $email = $contact->getEmail();

                echo '<tr>';
                echo "<td>$firstName</td>";
                echo "<td>$lastName</td>";
                echo "<td>$job</td>";
                echo "<td>$birthday</td>";
                echo "<td>$phoneNumber</td>";
                echo "<td>$hobby</td>";
                echo "<td>$email</td>";
                echo "<td><a href=\"editContact.php?contactId=$mongoId\">Edit</a> | <a href=\"doDeleteContact.php?contactId=$mongoId\">Delete</a></td>";
                echo '</tr>';
            }
            ?>
        </table>
    </section>
    <footer>
        <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
    </footer>
    </body>
    </html>
<?php
}