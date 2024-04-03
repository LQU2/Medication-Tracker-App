<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Medication Dose Tracker</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <h2>Sign Up</h2>
    <form action="signup.php" method="post">
        Email: <input type="email" name="email" required><br><br>
        Full Name: <input type="text" name="fullname" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>

</html>