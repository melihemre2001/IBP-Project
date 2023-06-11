<?php
require 'config.php';
require 'purchase.php';

if (isset($_POST['purchase_car']) && isset($_POST['purchase_table'])) {
    $purchase_car = $_POST['purchase_car'];
    $purchase_table = $_POST['purchase_table'];

    $deleteQuery = "DELETE FROM $purchase_table WHERE model = '$purchase_car'";
    $deleteCar = mysqli_query($conn, $deleteQuery);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <nav class="navbar">
            <div class="navbar-logo">
                <a href="index.php"><img src="images/logo.png" class="logo" alt="" /></a>
            </div>


            <div class="navbar-links-2">
                <a href="logout.php" class="btn login-btn">Logout</a>

            </div>
        </nav>

        <div class="thanks">
            <p class="thanks-choose">
                Thank you for choosing us
            </p>
            <br><br>
            <p class="thanks-deliver">
                Your car will be delivered to you within a week.
            </p>
        </div>

        <script src="script.js"></script>
</body>

<script src="script.js"></script>

</html>