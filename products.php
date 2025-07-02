<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Welcome Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  <style>
    html, body {
      height: 100%;
    }
    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 60px;
    }
    .content {
      flex: 1;
    }
  </style>
</head>

<body>
<div class="wrapper">
  <header class="navigation fixed-top nav-bg">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="homepage.php">Account</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item active"><a class="nav-link" href="products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log-out</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container mt-4">
    <div class="row justify-content-end mb-3">
      <div class="col-auto">
        <div class="d-flex align-items-center gap-2">
          <span class="mr-2 font-weight-bold">Sort by:</span>
          <form method="get" class="d-flex gap-2">
            <button type="submit" name="sort" value="newest" class="btn btn-sm btn-primary mr-2">Newest</button>
            <button type="submit" name="sort" value="oldest" class="btn btn-sm btn-primary mr-2">Oldest</button>
            <button type="submit" name="sort" value="recommendation" class="btn btn-sm btn-primary mr-2">Recommendation</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- page content -->
  <section class="section">
    <div class="container">
      <div class="row">
<?php
$products = [
  ["Gummies", 25, "pic1.png", "1gummies.html", "A chewy, fruity treat that’s fun to eat and perfect for sharing."],
  ["Chocolate Bar", 40, "pic2.png", "2chocolatebar.html", "Smooth and rich chocolate that melts in your mouth with every bite."],
  ["Lollipop", 10, "pic3.png", "3lollipop.html", "Colorful and sweet hard candy on a stick that lasts and lasts."],
  ["Marshmallow", 20, "pic4.png", "4marshmallow.html", "Soft, fluffy treats that are perfect for snacking or toasting."],
  ["Gummy Teeth", 30, "pic5.png", "5gummyteeth.html", "Playful, chewy candy shaped like little teeth with a fruity punch."],
  ["Gummy Corn", 30, "pic6.png", "6gummycorn.html", "Sweet and chewy candy shaped like corn kernels, fun and tasty."],
  ["Gummy Worms", 25, "pic7.png", "7gummyworms.html", "Wiggly, colorful worms bursting with tangy-sweet flavor."],
  ["Gummy Flowers", 30, "pic8.png", "8gummyflowers.html", "Pretty floral-shaped gummies with a garden of fruity flavors."],
  ["Gummy Hearts", 30, "pic9.png", "9gummyhearts.html", "Heart-shaped treats filled with love and sweet, fruity taste."],
  ["Choco", 35, "pic10.png", "10choco.html", "A bite-sized chocolate delight that satisfies your sweet tooth."],
  ["Gummy Cola", 25, "pic11.png", "11gummycola.html", "Fizzy, cola-flavored gummies that taste just like your favorite drink."],
  ["Chocolate-Covered Almonds", 50, "pic12.png", "12chocoal.html", "Crunchy almonds coated in rich, velvety chocolate."],
  ["Rock Candy", 15, "pic13.png", "13rockcandy.html", "Crystal-like sugar sticks that shimmer and crunch with sweetness."],
  ["Candy Rings", 10, "pic14.png", "14candyrings.html", "Wearable candy that’s sweet, fruity, and fun to eat."],
  ["Jelly Beans", 25, "pic15.png", "15jellybeans.html", "Tiny bean-shaped candies with a surprise of flavors in every bite."],
  ["Chocolate-Covered Pretzels", 45, "pic16.png", "16chocopret.html", "A perfect mix of salty crunch and smooth chocolate coating."],
  ["Sour Belts", 30, "pic17.png", "17sourbelts.html", "Tangy, colorful candy strips packed with a punch of sour flavor."],
  ["Toffee Bites", 35, "pic18.png", "18toffeebites.html", "Buttery, crunchy toffee candy that’s hard to resist."],
  ["Candy Buttons", 15, "pic19.png", "19candybuttons.html", "Cute little sugar dots on paper strips, full of colorful charm."],
  ["Bubblegum Balls", 5, "pic20.png", "20bubblegum.html", "Round, chewy gum balls bursting with classic bubble-blowing fun."]
];

// sort products if needed
if (isset($_GET['sort'])) {
  $sort = $_GET['sort'];
  if ($sort == 'newest') {
    $products = array_reverse($products);
  } elseif ($sort == 'recommendation') {
    usort($products, function($a, $b) {
      return $b[1] - $a[1]; // sort by price descending
    });
  }
  // if oldest, keep original
}

foreach ($products as $product) {
  list($name, $price, $image, $link, $desc) = $product;
  echo <<<HTML
  <div class="col-lg-4 col-sm-6 mb-4">
    <article class="card shadow">
      <img class="rounded card-img-top" src="pics/{$image}" alt="{$name}">
      <div class="card-body">
        <h4 class="card-title"><a class="text-dark" href="{$link}">{$name}</a></h4>
        <p class="cars-text">₱{$price}.00<br>{$desc}</p>
        <form method="post" action="cart.php" class="d-flex flex-column align-items-center">
          <input type="hidden" name="product_name" value="{$name}">
          <input type="hidden" name="product_price" value="{$price}">
          <div class="mb-2">
            <input type="number" name="product_quantity" min="1" value="1" class="form-control form-control-sm" style="width: 70px;" required>
          </div>
          <button type="submit" name="add_to_cart" class="btn btn-xs btn-primary">Add to cart</button>
        </form>
      </div>
    </article>
  </div>
HTML;
}
?>
      </div>
    </div>
  </section>

  <footer class="bg-dark footer-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="text-light">Email</h5>
          <p class="text-white paragraph-lg font-secondary">sweet.treats@gmail.com</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Phone</h5>
          <p class="text-white paragraph-lg font-secondary">0977-135-2302</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Address</h5>
          <p class="text-white paragraph-lg font-secondary">10 Santa Teresita, Caloocan City</p>
        </div>
      </div>
    </div>
  </footer>
</div>

<script src="plugins/jQuery/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
