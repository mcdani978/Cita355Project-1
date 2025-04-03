<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>New Student Form</title>
    <style>
        .container {
            justify-content: center;
            text-align: center;
            padding-top: 110px;
            font-size: 30px;
        }

        body {
            background-color: rgb(0, 254, 72);
        }

        input {
            width: 300px;
            height: 30px;
            font-size: 20px;
            padding: 5px;
            border: 2px solid #000;
            border-radius: 5px;
        }

        input:hover {
            background-color: pink;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="NewUserLoginConnectToDatabase.php" method="post">
            <p> Student ID:<input type="text" name="id"> </p>
            <p> First Name: <input type="text" name="firstname"></p>
            <p> Last Name: <input type="text" name="lastname"></p>
            <p> Email: <input type="text" name="email"> </p>
            <p> Password: <input type="password" name="setpassword"></p>
            <p> Confirm Password: <input type="password" name="ConfirmPassword"></p>
            <p> <input type="reset" value="Clear" />&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="submit" name="Submit" value="Create Account" /></p>
        </form>
    </div>
</body>
</html>

