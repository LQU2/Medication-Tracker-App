<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (email, full_name, password) VALUES ('$email', '$fullname', '$password')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email;
        header("Location: main.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
