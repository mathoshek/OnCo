<?php
session_start();
?>

<html>
<head>
    <title>But</title>
</head>
<body>
<form action="doSignIn.php" method="post">
    <input type="text" value="Username" name="username"/>
    <br/>
    <input type="password" value="Password" name="password"/>
    <br/>
    <input type="submit" value="Submit"/>
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
</body>
</html>