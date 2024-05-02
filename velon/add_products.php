<?php

include_once("DBconnect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


$product_id = $name = $description = $price = "";
$product_id_err = $name_err = $description_err = $price_err = $image_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["product_id"]))){
        $product_id_err = "Please enter a product ID.";
    } else{
        $product_id = trim($_POST["product_id"]);
    }

    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name for the product.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    if(empty(trim($_POST["description"]))){
        $description_err = "Please enter a description for the product.";     
    } else{
        $description = trim($_POST["description"]);
    }
    
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter the price of the product.";     
    } else{
        $price = trim($_POST["price"]);
    }

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $allowed_extensions = array("jpg", "jpeg", "png");
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
        if(!in_array($file_extension, $allowed_extensions)){
            $image_err = "Only JPG/JPEG/PNG files are allowed.";
        }
    } else{
        $image_err = "Please select an image file.";
    }
    
    if(empty($product_id_err) && empty($name_err) && empty($description_err) && empty($price_err) && empty($image_err)){
        $sql = "INSERT INTO products (product_id, name, description, price, image_path) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("issss", $param_product_id, $param_name, $param_description, $param_price, $param_image_path);
            
            $param_product_id = $product_id;
            $param_name = $name;
            $param_description = $description;
            $param_price = $price;

            $target_directory = "uploads/";
            $target_file = $target_directory . basename($_FILES["image"]["name"]);

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $param_image_path = $target_file;
            } else{
                echo "Error uploading image.";
            }
            
            if($stmt->execute()){
                header("location: submit.html"); 
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        $stmt->close();
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add New Product</h2>
        <p>Please fill this form to add a new product.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($product_id_err)) ? 'has-error' : ''; ?>">
                <label>Product ID</label>
                <input type="number" name="product_id" class="form-control" value="<?php echo $product_id; ?>">
                <span class="help-block"><?php echo $product_id_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Description</label>
                <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                <span class="help-block"><?php echo $price_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <span class="help-block"><?php echo $image_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
