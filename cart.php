<?php
session_start();

// Handle add to cart
if (isset($_POST['add_to_cart'])) {
  $name = $_POST['product_name'];
  $price = (int)$_POST['product_price'];
  $quantity = max(1, (int)$_POST['product_quantity']);

  $item = [
    'name' => $name,
    'price' => $price,
    'quantity' => $quantity
  ];

  $found = false;
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  foreach ($_SESSION['cart'] as &$cartItem) {
    if ($cartItem['name'] === $name) {
      $cartItem['quantity'] += $quantity;
      $found = true;
      break;
    }
  }
  unset($cartItem);

  if (!$found) {
    $_SESSION['cart'][] = $item;
  }
}

// Handle item removal
if (isset($_POST['remove_item'])) {
  foreach ($_SESSION['cart'] as $index => $item) {
    if ($item['name'] === $_POST['remove_item']) {
      unset($_SESSION['cart'][$index]);
      $_SESSION['cart'] = array_values($_SESSION['cart']);
      break;
    }
  }
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Cart</title>
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  
  <style>
  html, body {
    height: 100%;
  }

  .wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-top: 60px; /* your navbar offset */
  }

  .container.mt-5.pt-5 {
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
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log-out</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="container mt-5 pt-5">
      <h2 class="mb-4">Your Shopping Cart</h2>

      <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price (₱)</th>
              <th>Quantity</th>
              <th>Total (₱)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($_SESSION['cart'] as $item): 
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;
            ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td><?= number_format($item['price'], 2) ?></td>
              <td><?= $item['quantity'] ?></td>
              <td><?= number_format($subtotal, 2) ?></td>
              <td>
                <form method="post">
                  <button name="remove_item" value="<?= htmlspecialchars($item['name']) ?>" class="btn btn-sm btn-danger">Remove</button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <th colspan="3" class="text-right">Grand Total:</th>
              <th colspan="2">₱<?= number_format($total, 2) ?></th>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        <p>Your cart is empty.</p>
      <?php endif; ?>
    </div>

    <!-- Footer -->
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
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
