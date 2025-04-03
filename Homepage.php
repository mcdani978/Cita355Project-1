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
    <style>
        body { 
            background-color: rgb(170, 247, 3); 
        }  

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 50vh; 
        }

        .button, .Exambutton {
            margin: 10px;
        }

        .notloggedintext, .logintext {
            text-align: center;
            font-size: 30px;
        }

        .button button, .Exambutton button {
            font-size: 40px;
            padding: 15px 30px;
            width: 200px;
        }

        .topofthepagetext {
            text-align: center;
            font-size: 40px;
        }

        .pagecolor {
            background-color: rgb(30, 37, 232); 
        }
    </style>
</head>

<body>
    <div class="topofthepagetext">       
        <h1>Cita 355 Project 1</h1>
    </div>

    <div class="button-container">
        <?php if ($loggedIn) { ?>
            <h2>Welcome <?= $_SESSION['studentID'] ?></h2>
        <?php } ?>
        
        <div class="button">
            <button onclick="window.location.href='Login.php'">Login</button>
        </div>

        <?php if ($loggedIn): ?>
            <div class="logintext">
                <p>You are now logged in!</p>
            </div>
            <div class="Exambutton">
                <button onclick="window.location.href='test.php'">Go to Exam</button>
            </div>
        <?php else: ?>
            <div class="notloggedintext">
                <p>You are not logged in.</p>
            </div>
        <?php endif; ?>

        <?php if ($alreadyTaken) { ?>
            <p>You have already taken the exam today!</p>
        <?php } ?>
    </div>
</body>
</html>

