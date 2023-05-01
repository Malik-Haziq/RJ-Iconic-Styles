<!DOCTYPE html>
<html>

<head>
  <title>Organic Food</title>
  <meta charset="UTF-8">
  <meta name="description" content="test">
  <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
  <meta name="author" content="Anik">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
  <!--font-family: 'Raleway', sans-serif;-->
  <link rel="favicon" type="text/css" href="#favicon">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <!--header start--->
  <header>
    <?php
    SESSION_START();
    include "lib/connection.php";
    error_reporting(E_ERROR | E_PARSE);

    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM cart where userid='$id'";
    $result = $conn->query($sql);
    ?>
    <!--nav start--->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <a href=""><img src="img/logo-1.png" class="logo"></a>

          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vegetables.php"> Vegetables</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="fruits.php">Fruits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-us.php">About US</a>
            </li>
          </ul>
          <form class="form-inline" action="search(1).php" method="post">
            <!--<a href=""><img src="img/search.png"></a>-->
            <input class="form-control border border-secondary" type="search" placeholder="Search" aria-label="Search"
              name="name">
            <button class="btn btn-outline-dark" type="submit" style="margin-left:7px;margin-right:7px;"><img
                src="img/search.png"></button>
          </form>
          <?php
          $total = 0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
              $total++;
            }
          }
          ?>

          <a href="cart(1).php" class="mr-2"><img src="img/cart.png">
            <span class="badge badge-warning">
              <?php echo $total ?>
            </span>
          </a>

          <?php

          if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] == 1) {
              echo $_SESSION['username']; ?>
              <a href="profile.php" class="btn btn-primary ml-3">My Orders</a>
              <a href="logout.php" class="btn btn-info ml-2">logout</a>
              <?php
            }
          } else {
            ?>
            <a href="login.php" class="btn btn btn-primary ml-4">Login</a>
            <a href="Register.php" class="btn btn btn-info ml-2 ">Signup</a>
            <?php
          }
          ?>
        </div>
      </div>
    </nav>

    <!--nav end--->