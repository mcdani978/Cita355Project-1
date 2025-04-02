<?php
session_start();
$alreadyTaken = false;

if (isset($_GET['status']) && $_GET['status'] == 'loggedin') {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_SESSION['alreadyTaken']) && $_SESSION['alreadyTaken'] == 1)
{
    $alreadyTaken = true;
    unset($_SESSION['alreadyTaken']);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Home Page</title>
    </head>
    <body>
        <?php if ($loggedIn) {?>
            <h2>Welcome <?= $_SESSION['studentID'] ?></h2>
        <?php }?>
        <button onclick="window.location.href='Login.php'">Login</button>
        <?php if ($loggedIn): ?>
        <p>You are now logged in!</p>
        <button onclick="window.location.href='test.php'">Go to Exam</button>
    <?php else: ?>
        <p>You are not logged in.</p>
    <?php endif; ?>
        <?php if ($alreadyTaken) {
            ?><p>You have already taken the exam today!</p>
        <?php } ?>
    </body>
</html>
