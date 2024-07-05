<?php
session_start();
include("dbconnect.php");

$uid = $_SESSION["uid"];

$id = $_GET["id"];


$qry = "SELECT * FROM `user` WHERE id = '$uid'";
$result = mysqli_query($connect, $qry);

$data = mysqli_fetch_assoc($result);

$qry2 = "SELECT * FROM `recipes` where id = '$id'";
$result2 = mysqli_query($connect, $qry2);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Chef</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    /* Global Styles */
    body {
      font-family: Georgia, 'Times New Roman', Times, serif;
      line-height: 1.6;
      background-color: #FEF8E6; /* Light beige background */
      color: #03383F; /* Dark teal text */
      padding-top: 56px; /* Spacing to avoid overlay with the navbar */
    }

    a {
      color: #03383F; /* Dark teal for links */
    }

    a:hover {
      color: #F9972F; /* Orange when hovering over links */
    }

    .navbar {
      background-color: #708E8E; /* Secondary color for navbar background */
    }

    .navbar-brand {
      color: #FEF8E6; /* Light beige text */
      font-weight: bold;
    }

    .navbar-nav .nav-link {
      color: #FEF8E6; /* Light beige text for navbar links */
    }

    .navbar-nav .nav-link:hover {
      color: #F9972F; /* Orange when hovering over navbar links */
    }

    .dropdown-menu {
      background-color: #03383F; /* Dark teal dropdown menu */
    }

    .dropdown-menu .dropdown-item {
      color: #FEF8E6; /* Light beige text for dropdown items */
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #F9972F; /* Orange background on hover for dropdown items */
    }

    /* Header Section */
    header {
      background-color: #FDF2CC; /* Light yellow background */
      padding: 60px 0;
    }

    header h1 {
      color: #03383F; /* Dark teal heading */
    }

    header p {
      color: #03383F; /* Dark teal paragraph */
    }

    /* Recipe Section */
    .recipe-section {
      background-color: #FEF8E6; /* Light beige background */
      padding: 40px 0;
    }

    .recipe-section h2 {
      color: #03383F; /* Dark teal for subheadings */
      margin-top: 20px;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .recipe-section h4 {
      color: #F9972F; /* Orange for smaller subheadings */
      margin-top: 20px;
      font-size: 1.25rem;
      font-weight: bold;
    }

    .recipe-section ul,
    .recipe-section ol {
      color: #03383F; /* Dark teal for lists */
      margin-bottom: 20px;
    }

    .recipe-section ul {
      list-style-type: square;
    }

    .recipe-section ol {
      list-style-type: decimal;
    }

    .ingredients,
    .steps {
      background-color: #FDF2CC; /* Light yellow background for list items */
      border: 1px solid #03383F; /* Dark teal border */
      padding: 15px;
      border-radius: 5px;
    }

    .img-fluid {
      border: 5px solid #03383F; /* Dark teal border around image */
      margin: 20px 0;
    }

    .card-title {
      color: #F9972F; /* Orange for card title */
      font-size: 2rem;
      font-weight: bold;
    }

    .description {
      font-size: 1.2rem;
      margin-top: 20px;
      color: #03383F; /* Dark teal text */
    }

    /* Footer Section */
    footer {
      background-color: #03383F; /* Dark teal footer */
      color: #FEF8E6; /* Light beige text */
      padding: 20px 0;
    }

    footer p {
      margin: 0;
    }

    /* Ensuring consistent card height */
    .card {
      height: 100%;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php">Home Chef</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="recipes.html">Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.html">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="diet.html">Diet</a>
          </li>
        </ul>
        <span class="navbar-text">
          <div class="dropdown">
            <button type="button" class="btn dropdown-toggle bg-light" data-toggle="dropdown">
              <?php echo htmlspecialchars($data['username']); ?>
              <i class="bi bi-person-circle"></i>
            </button>
            <div class="dropdown-menu bg-dark dropdown-menu-right">
              <a class="dropdown-item" href="profile.html">Profile</a>
              <a class="dropdown-item" href="settings.html">Settings</a>
              <a class="dropdown-item" href="logout.html">Logout</a>
            </div>
          </div>
        </span>
      </div>
    </div>
  </nav>

  <header class="text-center py-5">
    <div class="container">
      <h1 class="mb-4">Welcome to Home Chef</h1>
      <p>Discover delicious recipes from around the world.</p>
    </div>
  </header>

  <section class="recipe-section py-5">
    <div class="container">
      <div class="row">
        <?php
        while ($data = mysqli_fetch_assoc($result2)) { ?>
          <div class="col-md-12">
            <div class="card shadow-sm border-0 mb-4">
              <div class="card-body">
                <h2 class="card-title text-center"><?php echo htmlspecialchars($data['title']); ?></h2>
                <p class="text-center author-id">by Author ID: <span><?php echo htmlspecialchars($data['authorid']); ?></span></p>
                <img src="images/<?php echo htmlspecialchars($data['image']); ?>" class="img-fluid rounded mx-auto d-block" alt="Recipe Image">
                <p class="description mt-4"><?php echo htmlspecialchars($data['description']); ?></p>
                <h4>Ingredients:</h4>
                <ul class="ingredients">
                  <?php echo nl2br(htmlspecialchars($data['ingredients'])); ?>
                </ul>
                <h4>Steps:</h4>
                <ol class="steps">
                  <?php echo nl2br(htmlspecialchars($data['steps'])); ?>
                </ol>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <footer class="text-center py-4">
    <div class="container">
      <p>&copy; 2024 Home Chef. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
