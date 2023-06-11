<?php
echo '<link rel="stylesheet" href="style.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">';
?>

<?php
require 'config.php';

$selectedCarID = isset($_GET['vehicle']) ? $_GET['vehicle'] : null;

$vehicles = array('suvs', 'trucks', 'sedans', 'vans', 'hybrids');
$selectedTableName = null;

foreach ($vehicles as $vehicleType) {
    $query = "SELECT id,brand, model, year, price, color, rating, img FROM $vehicleType";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $brand = $row['brand'];
            $model = $row['model'];
            $year = $row['year'];
            $price = $row['price'];
            $color = $row['color'];
            $rating = $row['rating'];
            $img = $row['img'];
            $imagePath = "images/$vehicleType/$img";
            $vehicleID = $model;

            if ($vehicleID === $selectedCarID) {
                $selectedBrand = $brand;
                $selectedModel = $model;
                $selectedYear = $year;
                $selectedPrice = $price;
                $selectedColor = $color;
                $selectedRating = $rating;
                $selectedImg = $img;
                $selectedImagePath = $imagePath;
                $selectedTableName = $vehicleType;
            }
        }
    }
}

if ($selectedCarID) {
?>
    <html>

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
            <div id="<?php echo $selectedCarID; ?>" class="<?php echo $selectedTableName; ?>">
                <div class="car-details">
                    <img src="<?php echo $selectedImagePath; ?>" class="" alt="">
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
                </div>
            </div>
            <div class="purchase-btn">
                <p>Are you sure?</p>
                <a href="#" onclick="goToPurchase('<?php echo $selectedCarID ?>', '<?php echo $selectedTableName ?>');"><button type="submit" class="purchase-buy-btn">Buy Now</button></a>
                <br>
                <a href="index.php"><button class="purchase-no-btn">No, I'm Not</button></a>
            </div>

            <script>
                function goToPurchase(modelName, tableName) {
                    let form = document.createElement('form');
                    form.action = 'purchase-completed.php';
                    form.method = 'post';

                    var input1 = document.createElement('input');
                    input1.type = 'hidden';
                    input1.name = 'purchase_car';
                    input1.value = modelName;

                    var input2 = document.createElement('input');
                    input2.type = 'hidden';
                    input2.name = 'purchase_table';
                    input2.value = tableName;

                    form.appendChild(input1);
                    form.appendChild(input2);
                    document.body.appendChild(form);
                    form.submit();
                }
            </script>
    </body>

    </html>
<?php
}
?>