<?php
require 'dbConnection.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $studentId = trim($_POST["id"]);
    $firstName = trim($_POST["firstname"]);
    $lastName = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $password = $_POST["setpassword"];
    $confirmPassword = $_POST["ConfirmPassword"];

    // Check if any fields are empty
    if (empty($studentId) || empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
        exit();  
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();  
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();  
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Insert student info into database
        $sql = "INSERT INTO studentinformation (StudentId, FirstName, LastName, Email, Password) 
                VALUES (:studentId, :firstName, :lastName, :email, :password)";


        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':studentId' => $studentId,
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        // Store student ID in session
        $_SESSION['studentID'] = $studentId;

        // Redirect to homepage
        header("Location: homepage.php?status=loggedin");
        exit();  
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        exit();  
    }
}
?>
