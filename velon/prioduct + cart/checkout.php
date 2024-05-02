<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $total = $_SESSION['total'];
} else {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../DBconnect.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    $status = "Confirmed";

    $stmt = $conn->prepare("INSERT INTO orders (customer_id, total_amount,status) VALUES (?, ?,?)");

    $stmt->bind_param("iis", $customer_id, $total,$status);

    $stmt->execute();

    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Order placed successfully!";
        header("location: index.php");
    }
    $stmt->close();
    $conn->close();
}
?>