<?php
session_start();
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
        <form action="doSignIn.php" method="post">
            <table style="margin:0 auto">
                <tr>
                    <td><label for="input0">Username:</label></td>
                    <td><input id="input0" type="text" name="username"/></td>
                </tr>
                <tr>
                    <td><label for="input1">Password:</label></td>
                    <td><input id="input1" type="password" name="password"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input style="width:100%" type="submit" value="Submit"/></td>
                </tr>
            </table>
        </form>
    <?php
    if (isset($_SESSION['errorAccountDoesntExist'])) {
        echo '<p>' . $_SESSION['errorAccountDoesntExist'] . '</p>';
        unset($_SESSION['errorAccountDoesntExist']);
    }
    if (isset($_SESSION['errorWrongPassword'])) {
        echo '<p>' . $_SESSION['errorWrongPassword'] . '</p>';
        unset($_SESSION['errorWrongPassword']);
    }
    ?>
</section>
<footer>
    <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
</footer>
</body>
</html>