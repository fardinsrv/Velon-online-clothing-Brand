<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
</head>
<body>


    <div class="header">
        <p class="logo">Home</p>
        <div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count">0</p></div>
    </div>
    <div class="container">
        <div id="root"></div>
        <div class="sidebar">
            <div class="head"><p>My Cart</p></div>
            <div id="cartItem">Your cart is empty</div>
            <div class="foot">
                <h3>Total</h3>
                <h2 id="total">TK 0.00</h2>
                <form action="../payment.php" method="post">
                <input type="hidden" id="totalInput" name="total">

                    <button type="submit">Place Order</button>
                </form>
                <form action="../index.php" method="post">
                    <button type="logout">Logout</button>
                </form>

            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>