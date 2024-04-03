<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        header("Location: main.php");
    } else {
        echo "Invalid email or password";
    }
}
?>
