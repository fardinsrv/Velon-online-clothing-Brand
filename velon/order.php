<?php
include_once("./DBconnect.php"); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <?php
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Order Id</th>
                        <th>Customer ID</th>
                        <th>Order Date</th>
                        <th>Total amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["order_id"]."</td>
                    <td>".$row["customer_id"]."</td>
                    <td>".$row["order_date"]."</td>
                    <td>".$row["total_amount"]."</td>
                    <td>".$row["status"]."</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>0 results</div>";
    }
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
