<?php
require('config.php');

if (isset($_SESSION['user_id'])) {
  
  echo '<a href="logout.php">Logout</a>';
} else {
  
  echo '<a href="login.php">Login</a>';
}
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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


      <div class="navbar-links">
        <ul>
          <li><a class="navbar-links-elements" href="how-it-works.html">How It Works</a></li>
          <li><a class="navbar-links-elements" href="faq.html">FAQ</a></li>
        </ul>
      </div>
      <div class="navbar-links-2">
        <a href="logout.php" class="btn login-btn">Logout</a>

      </div>
    </nav>
    <div class="content">
      <p>Buy The Right Car.</p>
      <br />
      <p>We are trying to find the best car for you.</p>
      <br />

      <a href="#section-header" class="btn btn-start">Get Started</a>
    </div>
    <div id="section-header" class="section-header">
      <h1 style="color: #fff">Choose your own type</h1>
    </div>
    <section id="section-cars">
      <div class="cars">
        <div class="cars-item car-suvs">
          <a href="#Captiva Sport LS">
            <img src="images/suv.svg" alt="" />
          </a>
          <p>SUV's</p>
        </div>
        <div class="cars-item car-trucks">
          <a href="#1500 Tradesman">
            <img src="images/pickup-trucks.svg" alt="" />
          </a>
          <p>Trucks</p>
        </div>
        <div class="cars-item car-sedans">
          <a href="#A4 Premium">
            <img src="images/sedans.svg" alt="" />
          </a>
          <p>Sedans</p>
        </div>
        <div class="cars-item car-vans">
          <a href="#NV 3500 SL">
            <img src="images/vans.svg" alt="" />
          </a>
          <p>Vans</p>
        </div>
        <div class="cars-item car-hybrids">
          <a href="#RX 450h F-SPORT">
            <img src="images/hybrids.svg" alt="" />
          </a>
          <p>Hybrids</p>
        </div>
      </div>
    </section>

    <div id="car-list">
      <?php
      require('cars.php');
      ?>

    </div>

    <button onclick="scrollToTop()" id="topBtn">
      <i class="fa fa-chevron-up"></i>
    </button>

    <footer class="footer">
      <div class="footer-p">
        <p>&copy; 2023 Melih Car Dealership. Tüm hakları saklıdır.</p>
      </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>