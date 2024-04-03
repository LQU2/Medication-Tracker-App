<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['medicine_name'])) {
    $medicine_name = $_GET["medicine_name"];
    $sql = "DELETE FROM medication WHERE medicine_name='$medicine_name'";
    if ($conn->query($sql) === TRUE) {
        header("Location: main.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
