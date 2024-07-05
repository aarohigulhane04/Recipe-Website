<?php
include("dbconnect.php");

$qry2 = "SELECT * FROM `recipes`";
$result2 = mysqli_query($connect, $qry2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="recipe.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <title>Home Chef</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark" >
    <div class="container">
      <a class="navbar-brand" href="index.php">Home Chef</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Diet</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero" class="d-flex align-items-center justify-content-center text-center">
    <div class="container" style="margin-top: 100px;">
      <h3 class="mb-5">Our Popular Categories</h3>
      <div class="row">
        <div class="col-md-3">
          <div class="card bg-transparent border-0" style="margin-top: 0px;">
            <img src="images/chicken.jpg" class="card-img-top rounded-circle mx-auto" alt="Chicken">
            <div class="card-body">
              <p class="card-text">Chicken</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-transparent border-0" style="margin-top: 0px;">
            <img src="images/pizza.jpg" class="card-img-top rounded-circle mx-auto" alt="Pizza">
            <div class="card-body">
              <p class="card-text">Pizza</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-transparent border-0" style="margin-top: 0px;">
            <img src="images/dessert.jpg" class="card-img-top rounded-circle mx-auto" alt="Dessert">
            <div class="card-body">
              <p class="card-text">Dessert</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-transparent border-0" style="margin-top: 0px;">
            <img src="images/pasta.png" class="card-img-top rounded-circle mx-auto" alt="Pasta">
            <div class="card-body">
              <p class="card-text">Pasta</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="my-5">
    <div class="container">
      <div class="row">

      <?php
        while ($data = mysqli_fetch_assoc($result2)) { ?>

        <div class="col-md-4">
          <div class="card">
            <img src="images/<?php echo $data['image']; ?>" class="card-img-top" >
            <div class="card-body">
              <h5 class="card-title" style="color:red"><?php echo $data["title"] ?></h5>
              <p class="card-text"><?php echo $data["description"] ?></p>
            </div>
          </div>
        </div>
        <?php } ?>
       
        
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="py-5" style="background-color: #03383F; color: #FEF8E6;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>Welcome to our online recipe sharing platform where you can discover and share the best recipes from around the world!</p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light">Home</a></li>
            <li><a href="#" class="text-light">Categories</a></li>
            <li><a href="#" class="text-light">Submit a Recipe</a></li>
            <li><a href="#" class="text-light">Contact Us</a></li>
            <li><a href="#" class="text-light">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-telephone-fill"></i> +123-456-7890</li>
            <li><i class="bi bi-envelope"></i> info@recipes.com</li>
            <li><i class="bi bi-geo-alt-fill"></i> 123 Recipe Street, Food City</li>
          </ul>
          <div class="social-links">
            <a href="#" class="text-light mr-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-light mr-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-light mr-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-light"><i class="bi bi-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-3" style="background-color: #708E8E; color: #FEF8E6;">
      &copy; 2024 Recipe Sharing Platform | All rights reserved.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
