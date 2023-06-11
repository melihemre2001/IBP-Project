<?php





require 'config.php';

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
            $vehicleID = $model;
?>

            <html>

            <body>

                <div id="<?php echo $vehicleID; ?>" class="cars-item-list <?php echo $vehicleType; ?>">
                    <div class="cars-gallery">
                        <img src="<?php echo $imagePath; ?>" class="cars-gallery-img" alt="">
                        <h3><?php echo $year . ' ' . $brand . ' ' . $model ?></h3>
                        <h6><?php echo '$' . $price; ?></h6>
                        <ul>
                            <?php for ($i = 0; $i < $rating; $i++) { ?>
                                <li><i class="fa fa-star checked"></i></li>
                            <?php } ?>
                            <?php for ($i = $rating; $i < 5; $i++) { ?>
                                <li><i class="fa fa-star"></i></li>
                            <?php } ?>
                        </ul>
                        <a href="purchase.php?vehicle=<?php echo $vehicleID; ?>"><button onclick="getDivClass(this)" class="buy-btn">Buy Now</button></a>
                    </div>
                </div>

                <script src="script.js"></script>
            </body>

            </html>



<?php
        }
    }
}
?>