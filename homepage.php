<?php
session_start();
if (!isset($_SESSION['user_data'])) {
    header("Location: login.php");
    exit;
} else {
    $user = $_SESSION['user_data'];

    $fullname = $user[0];
    $gender = $user[1];
    $dob = $user[2];
    $phone = $user[3];
    $email = $user[4];
    $street = $user[5];
    $city = $user[6];
    $province = $user[7];
    $zip = $user[8];
    $country = $user[9];
    $username = $user[10];
}
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
    }

    .content {
      flex: 1;
    }

    .page-title {
      padding: 100px 0 50px; /* reduced from 250px/150px */
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

    <!-- page title -->
    <section class="page-title bg-primary position-relative content">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="text-white font-tertiary">Welcome, <?php echo $username?>!</h1>
          </div>
        </div>

          <!-- background shapes -->
  <img src="images/illustrations/leaf-pink-round.png" alt="illustrations" class="bg-shape-2">
  <img src="images/illustrations/dots-cyan.png" alt="illustrations" class="bg-shape-3">
  <img src="images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-6">
</section>


<section class="page-title bg-primary position-relative content">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="bg-white rounded text-center p-4 shadow-down">
        <h4 class="mb-4">Personal Information</h4>
        <div class="message-control px-0 mb-4"><b>Name:</b> <?php echo $fullname; ?></div>
        <div class="message-control px-0 mb-4"><b>Gender:</b> <?php echo $gender; ?></div>
        <div class="message-control px-0 mb-4"><b>Date of Birth:</b> <?php echo $dob; ?></div>
        <div class="message-control px-0 mb-4"><b>Phone:</b> <?php echo $phone; ?></div>
        <div class="message-control px-0 mb-4"><b>Email:</b> <?php echo $email; ?></div>
        <div class="message-control px-0 mb-4"><b>Street:</b> <?php echo $street; ?></div>
        <div class="message-control px-0 mb-4"><b>City:</b> <?php echo $city; ?></div>
        <div class="message-control px-0 mb-4"><b>Province:</b> <?php echo $province; ?></div>
        <div class="message-control px-0 mb-4"><b>ZIP:</b> <?php echo $zip; ?></div>
        <div class="message-control px-0 mb-4"><b>Country:</b> <?php echo $country; ?></div>
        <div class="message-control px-0 mb-4"><b>Username:</b> <?php echo $username; ?></div>
      </div>
    </div>
  </div>
</div>
</section>


    <!-- footer -->
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
    <!-- /footer -->
  </div>

  <script src="plugins/jQuery/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
