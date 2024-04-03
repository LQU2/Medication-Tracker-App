<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
include "connection.php";
$email = $_SESSION['email'];
$sql = "SELECT * FROM medication WHERE email='$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Medication Dose Tracker</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Medication List</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Medicine Name</th><th>Dose</th><th>Frequency</th><th colspan='2'>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["medicine_name"] . "</td><td>" . $row["dose"] . "</td><td>" . $row["frequency"] . "</td><td><a href='edit.php?medicine_name=" . $row["medicine_name"] . "'>Edit</a></td><td><a href='delete.php?medicine_name=" . $row["medicine_name"] . "'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No medicines found.";
    }
    ?>
    <br><br>
    <a href="add.php">Add Medicine</a>
    <br><br>
    <a href="logout.php">Logout</a>
</body>

</html>