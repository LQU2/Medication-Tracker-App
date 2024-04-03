<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $medicine_name = $_GET["medicine_name"];
    $sql = "SELECT * FROM medication WHERE medicine_name='$medicine_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Medicine not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST["medicine_name"];
    $dose = $_POST["dose"];
    $frequency = $_POST["frequency"];

    $sql = "UPDATE medication SET dose='$dose', frequency='$frequency' WHERE medicine_name='$medicine_name'";
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
    <h2>Edit Medicine</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Medicine Name: <input type="text" name="medicine_name" value="<?php echo $row['medicine_name']; ?>" readonly><br><br>
        Dose: <input type="text" name="dose" value="<?php echo $row['dose']; ?>" required><br><br>
        Frequency: <input type="text" name="frequency" value="<?php echo $row['frequency']; ?>" required><br><br>
        <input type="submit" value="Save Changes">
    </form>
    <br><br>
    <a href="main.php">Back to Main</a>
</body>
</html>
