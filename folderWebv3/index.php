<?php
session_start();
$shopItems = [
  [
    "id" => 1,
    "item_Name" => "Gum Shield",
    "item_desc" => "Pelindung gigi berkualitas tinggi",
    "item_price" => "35.000",
    "item_image" => "images/p1.png",
  ],
  [
    "id" => 2,
    "item_Name" => "Boxing Gloves",
    "item_desc" => "Sarung tinju premium",
    "item_price" => "250.000",
    "item_image" => "images/p2.png",
  ],
  [
    "id" => 3,
    "item_Name" => "Karate Uniform",
    "item_desc" => "Seragam karate profesional",
    "item_price" => "235.000",
    "item_image" => "images/p3.png",
  ],
  [
    "id" => 4,
    "item_Name" => "Shin Guard",
    "item_desc" => "Pelindung tulang kering",
    "item_price" => "300.000",
    "item_image" => "images/p4.png",
  ],
  [
    "id" => 5,
    "item_Name" => "Skipping Rope",
    "item_desc" => "Tali skipping latihan",
    "item_price" => "20.000",
    "item_image" => "images/p5.png",
  ],
  [
    "id" => 6,
    "item_Name" => "Head Guard",
    "item_desc" => "Pelindung kepala berkualitas",
    "item_price" => "350.000",
    "item_image" => "images/p6.png",
  ],
  [
    "id" => 7,
    "item_Name" => "Boxing Pad",
    "item_desc" => "Alat untuk melatih serangan",
    "item_price" => "176.000",
    "item_image" => "images/p7.png",
  ],
  [
    "id" => 8,
    "item_Name" => "Hand Wraps",
    "item_desc" => "Pita tangan untuk perlindungan",
    "item_price" => "79.000",
    "item_image" => "images/p8.png",
  ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="shortcut icon" href="images/boxingIcon.png" type="image/x-icon" />

  <title>Bumi mas Combat</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span> Bumi mas Combat </span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""> About Us </a>
            </li>
          </ul>
          <div class="user_option ml-auto">
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
              <span class="user-greeting">Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
              <a href="logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span> Logout </span>
              </a>
            <?php else: ?>
              <a href="loginPage.php?form=signIn">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span> Login </span>
              </a>
              <a href="loginPage.php?form=signUp">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span> register </span>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section">
      <div class="slider_container">
        <div class="detail-box">
          <h1>
            Welcome To Our <br />
            Combat Shop
          </h1>
          <h5>
            "Equip for Greatness, Train for Victory!"
          </h5>
          <P>
            At our martial arts store, we provide high-quality gear designed for warriors of all levels.
            Whether you're a beginner or a seasoned fighter, our equipment ensures durability, comfort, and
            peak performance.
          </P>
          <a href="#Products"> See Products </a>
        </div>
        <div class="img-box">
          <img src="images/slider-img.jpg" alt="" />
        </div>
      </div>
    </section>
    <!-- end hero area -->

    <!-- shop section -->
    <section id="Products" class="shop_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Products</h2>
        </div>
        <div class="shop-items">
          <?php foreach ($shopItems as $shopItem): ?>
            <div class="shop-item">
              <div class="box">
                <div class="img-box">
                  <img src="<?= $shopItem['item_image'] ?>" alt="<?= $shopItem['item_Name'] ?>" />
                </div>
                <div class="detail-box">
                  <h6><?= $shopItem['item_Name'] ?></h6>
                  <h6>
                    Price
                    <span>Rp <?= $shopItem['item_price'] ?> </span>
                  </h6>
                  <div class="btn-box">
                    <a href="itemView.php?id=<?= $shopItem['id'] ?>" class="btn"> View Product </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>

    <!-- info section -->
    <section class="info_section layout_padding2-top">
      <div class="social_container">
        <div class="social_box">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <div class="contact_info">
        <h6>CONTACT US</h6>
        <div class="info_links">
          <div class="info_item">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span> Address: 123 Street, Banjarmasin, Indonesia </span>
            </a>
          </div>
          <div class="info_item">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>+62-123-456-789</span>
            </a>
          </div>
          <div class="info_item">
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Akunkami@gmail.com</span>
          </div>
        </div>
      </div>
      <!-- footer section -->
      <footer class="footer_section">
        <div class="container">
          <p>
            Nama : Raymond Hariyono, NIM : 2310817210007 <br>
            Nama : Muhammad Aufa Fitrianda, NIM : 2310817210013 </p>
        </div>
      </footer>

    </section>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>