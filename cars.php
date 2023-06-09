<?php
require "config.php";

$sql = 'SELECT brand, model, year, price, color, rating from suvs';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suv_brand = $row['brand'];
        $suv_model = $row['model'];
        $suv_year = $row['year'];
        $suv_price = $row['price'];
        $suv_color = $row['color'];
        $suv_rating = $row['rating'];

?>
        <div class="cars-gallery">
            <img src="images/suvs/hero.webp" class="cars-gallery-img" alt="">
            <h3><?php echo $suv_year . ' ' . $suv_brand . ' ' . $suv_model ?></h3>
            <h6><?php echo $suv_price; ?></h6>
            <ul>
                <?php for ($i = 0; $i < $suv_rating; $i++) { ?>
                    <li><i class="fa fa-star checked"></i></li>
                <?php } ?>
                <?php for ($i = $suv_rating; $i < 5; $i++) { ?>
                    <li><i class="fa fa-star"></i></li>
                <?php } ?>
            </ul>
            <a href="purchase.php"><button class="buy-btn">Buy Now</button></a>
        </div>

<?php
    }
}
