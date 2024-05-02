<?php
include_once("./DBconnect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $customers = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $customers = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Panel</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="show_products.php">Show Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modify_products.php">Modify Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="order.php">Orders</a>
            </li>
        </ul>
    </div>
</nav>

<main class="container mt-5">
    <h2>Welcome to Admin Dashboard</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) { ?>  
                <tr>
                    <td><?php echo $customer['customer_id']; ?></td>
                    <td><?php echo $customer['fname']; ?></td>
                    <td><?php echo $customer['lname']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Logout</a>
</main>

<footer>
    © all credits to VELON
</footer>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
