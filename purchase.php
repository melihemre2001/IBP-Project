<!DOCTYPE html>
<html>

<head>
    <title>Araba Satışı</title>
</head>

<body>
    <h1>Araba Satışı</h1>

    <?php
    // Form gönderildiğinde işlenecek kod
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form verilerini alma
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $price = $_POST["price"];
        $color = $_POST["color"];

        // Veritabanı bağlantısı oluşturma
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "cars";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol etme
        if ($conn->connect_error) {
            die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
        }

        // Verileri veritabanına ekleme
        $sql = "INSERT INTO cars (brand, model, year, price, color) VALUES ('$brand', '$model', '$year', '$price', '$color')";

        if ($conn->query($sql) === TRUE) {
            echo "Satın alma başarıyla tamamlandı!";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }

        // Veritabanı bağlantısını kapatma
        $conn->close();
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="brand">Marka:</label>
            <input type="text" name="brand" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="year">Yıl:</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Fiyat:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Renk:</label>
            <input type="text" name="color" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Renk:</label>
            <select name="color" class="form-control" required>
                <option value="Kırmızı">Kırmızı</option>
                <option value="Mavi">Mavi</option>
                <option value="Yeşil">Yeşil</option>
                <option value="Sarı">Sarı</option>
                <option value="Beyaz">Beyaz</option>
            </select>
        </div>

        <input type="submit" value="Satın Al" class="btn btn-primary">
    </form>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
</body>

</html>