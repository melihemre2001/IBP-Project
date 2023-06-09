<?php
echo '<link rel="stylesheet" href="style.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">';
?>

<?php

require 'config.php';

$selectedCarID = isset($_GET['vehicle']) ? $_GET['vehicle'] : null;

$vehicles = array('suvs', 'trucks', 'sedans', 'vans', 'hybrids');

foreach ($vehicles as $vehicleType) {
    $query = "SELECT brand, model, year, price, color, rating, img FROM $vehicleType";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $brand = $row['brand'];
            $model = $row['model'];
            $year = $row['year'];
            $price = $row['price'];
            $color = $row['color'];
            $rating = $row['rating'];
            $img = $row['img'];
            $imagePath = "images/$vehicleType/$img";
            $vehicleID = $vehicleType . '-' . $brand . '-' . $model;

            if ($vehicleID === $selectedCarID) {
                $selectedBrand = $brand;
                $selectedModel = $model;
                $selectedYear = $year;
                $selectedPrice = $price;
                $selectedColor = $color;
                $selectedRating = $rating;
                $selectedImg = $img;
                $selectedImagePath = $imagePath;
            }
        }
    }
}

if ($selectedCarID) {
?>

    <body>
        <div class="container">
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <nav class="navbar">
                <div class="navbar-logo">
                    <a href="#"><img src="images/logo.png" class="logo" alt="" /></a>
                </div>

                <div class="navbar-links">
                    <ul>
                        <li><a class="navbar-links-elements" href="#">Features</a></li>
                        <li><a class="navbar-links-elements" href="how-it-works.html">How It Works</a></li>
                        <li><a class="navbar-links-elements" href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="navbar-links-2">
                    <a href="logout.php" class="btn login-btn">Logout</a>

                </div>
            </nav>
            <div id="<?php echo $selectedCarID; ?>">
                <div class="car-details">
                    <img src="<?php echo $selectedImagePath; ?>" class="car-gallery-img" alt="">
                    <h3><?php echo $selectedYear . ' ' . $selectedBrand . ' ' . $selectedModel ?></h3>
                    <h6><?php echo '$' . $selectedPrice; ?></h6>
                    <ul>
                        <?php for ($i = 0; $i < $selectedRating; $i++) { ?>
                            <li><i class="fa fa-star checked"></i></li>
                        <?php } ?>
                        <?php for ($i = $selectedRating; $i < 5; $i++) { ?>
                            <li><i class="fa fa-star"></i></li>
                        <?php } ?>
                    </ul>
                    <a href="purchase-completed.php"><button>Buy Now</button></a>
                </div>
            </div>
        <?php
    }

        ?>