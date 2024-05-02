<?php
include_once("DBconnect.php");

if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $product_id = $_GET["id"];

    $sql = "DELETE FROM products WHERE product_id = $product_id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Invalid product ID";
}

$conn->close();
?>
