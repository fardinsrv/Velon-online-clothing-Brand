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
  <title>Product List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h1>Product List</h1>
  <?php
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  ?>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?php echo $row["product_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><a href='delete_products.php?id=<?php echo $row["product_id"]; ?>' class="btn btn-danger">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <a href='add_products.php' class="btn btn-primary">Add New Item</a>
  <?php
  } else {
    echo "<p class='alert alert-warning'>0 results</p>";
  }
  ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
