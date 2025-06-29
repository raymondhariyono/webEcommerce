<?php
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
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

$selectedItem = null;
foreach ($shopItems as $item) {
  if ($item['id'] == $id) {
    $selectedItem = $item;
    break;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item Detail</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styleitem.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
  <div class="hero_area">
    <!-- header section -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span> Bumi mas Combat </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.html"> About Us </a>
            </li>
          </ul>
          <div class="user_option">
            <a href="">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span> Login </span>
            </a>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

    <!-- shop section -->
    <section id="ProductDetail" class="shop_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="img-box">
              <img src="<?= $selectedItem['item_image'] ?>" alt="<?= $selectedItem['item_Name'] ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <h2><?= $selectedItem['item_Name'] ?></h2>
              <h4>Rp <?= $selectedItem['item_price'] ?></h4>
              <p><?= $selectedItem['item_desc'] ?></p>
              <div class="btn-box">
                <a href="add_to_cart.php" class="btn">Add to Cart</a>
                <a href="index.php" class="btn">Back to Shop</a>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- end shop section -->

    <!-- info section -->
    <section class="info_section layout_padding2-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="info_item">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span> Address: 123 Street, Banjarmasin, Indonesia </span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_item">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span> Phone: +123 456 7890 </span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_item">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span> Email: info@example.com </span>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <p>&copy; 2025 All Rights Reserved. Design by Free CSS Templates</p>
  </footer>
  <!-- end footer section -->
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>