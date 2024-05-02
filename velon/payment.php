<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $total = $_POST['total'];
    $_SESSION['total'] = $total;
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        /* CSS styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; 
        }

        .payment-header {
            text-align: center;
            padding: 20px 0;
            background-color: #add8e6; 
            color: #fff;
            font-size: 24px; 
        }

        .container {
            background-color: #fff;
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            max-width: 500px; 
            margin: 20px auto; 
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .col {
            width: 100%;
        }

        .inputBox {
            margin-bottom: 20px;
        }

        .inputBox span {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .inputBox input {
            width: calc(100% - 20px);
            padding: 10px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .inputBox input:focus {
            outline: none; 
            border-color: #4caf50; 
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #45a049; 
        }
    </style>

</head>
<body>


<div class="payment-header">
    <h1>Payment</h1>
</div>

<div class="container">

    <form action="prioduct + cart/checkout.php" method="post">

        <div class="row">

            <div class="col">

                <div class="inputBox">
                    <span>Full Name:</span>
                    <input type="text" placeholder="Jessica Doe">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Room - Street - Locality">
                </div>
                <div class="inputBox">
                    <span>Payment Method (Bkash):</span>
                    <input type="text" placeholder="017******">
                </div>
            </div>
    
        </div>

        <input type="submit" value="Proceed to Checkout" class="submit-btn">
        

    </form>

</div>    
    
</body>
</html>