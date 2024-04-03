<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST["medicine_name"];
    $dose = $_POST["dose"];
    $frequency = $_POST["frequency"];
    $email = $_SESSION['email'];

    $sql = "INSERT INTO medication (medicine_name, dose, frequency, email) VALUES ('$medicine_name', '$dose', '$frequency', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: main.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Medication Dose Tracker</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Add Medicine</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Medicine Name: <input type="text" name="medicine_name" required><br><br>
        Dose: <input type="text" name="dose" required><br><br>
        Frequency: <input type="text" name="frequency" required><br><br>
        <input type="submit" value="Add">
    </form>
    <br><br>
    <a href="main.php">Back to Main</a>
</body>

</html>