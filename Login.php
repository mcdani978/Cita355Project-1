<?php
require 'dbConnection.php';  

session_start();  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

   
    if (empty($email) || empty($password)) {
        echo "<p class='error'>Email and password are required.</p>";
    } else {
        try {
            
            $sql = "SELECT * FROM studentinformation WHERE Email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['Password'])) {
                
                $_SESSION['user_id'] = $user['StudentId'];
                $_SESSION['first_name'] = $user['FirstName'];
                $_SESSION['last_name'] = $user['LastName'];
                $_SESSION['email'] = $user['Email'];

                
                header("Location: homepage.php?status=loggedin");
                exit();
            } else {
                echo "<p class='error'>Invalid email or password.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='error'>Database error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Log In</title> 
<style> 
body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; } 

.container { 
    max-width: 400px;
    background: white; 
    padding: 20px; 
    box-shadow: 0px 0px 10px #aaa;
    margin: auto; 
    justify-content: center;
    text-align: center;
} 

input, textarea, select { width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; } 

.error { color: red; } 
.success { color: green; } 

input[type="submit"]:hover { background-color: pink; }

body { background: DeepSkyBlue; }

input:hover { background-color: pink; }

textarea:hover { background-color: pink; }

select:hover { background-color: pink; }

.toptext {text-align: center;}
</style> 
</head> 
<body> 
<div class="container"> 

<div class="toptext">
<h2>Log In</h2> 
</div>


<form method="POST" action="Login.php">
    <label>Email:</label> 
    <input type="email" name="email"> 

    <label>Password:</label>
    <input type="password" name="password"> 

    <p><input type="submit" value="Log In"></p> 
</form>


<button onclick="window.location.href='NewUserLogin.php'">Create Account</button>

</div> 
</body> 
</html>
