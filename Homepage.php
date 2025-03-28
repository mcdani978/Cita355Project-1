<?php
session_start();

if (isset($_GET['status']) && $_GET['status'] == 'loggedin') {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Home Page</title>
    </head>
    <body>
        <button onclick="window.location.href='Login.php'">Login</button>
        <?php if ($loggedIn): ?>
        <p>You are now logged in!</p>
        <button onclick="window.location.href='test.php'">Go to Exam</button>
    <?php else: ?>
        <p>You are not logged in.</p>
    <?php endif; ?>
    </body>
</html>
