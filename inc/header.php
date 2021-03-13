<!-- Essential File -->
<?php
include "./lib/Session.php";
Session::init();
include "./lib/Database.php";
include "./helpers/Format.php";

spl_autoload_register(function ($class) {
  include "classes/" . $class . ".php";
});

$db            = new Database();
$fm           = new Format();
$admin     = new Admin();
$exam      = new Exam();
$process = new Process();
$user       = new User();

// Browser Cache
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

?>


<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Online Exam System :: Developed By Mithu</title>
  <meta name="description" content="This is a online exam system website where you will test your preparation for BCS,  University, College etc." />

  <!-- Fontawesome -->
  <link rel="stylesheet" href="fontawesome/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- Custom Css -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="main.css">

</head>

<body>


  <div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
      <?php
      $login = Session::get("Login");
      if ($login == true) { ?>
        <div class=" text-white">
          Welcome, <strong class="text-warning"><?php echo Session::get("userName"); ?></strong>
        </div>

      <?php } else { ?>
        <a class="navbar-brand" href="#">Pora<span>Shuna</span></a>
      <?php } ?>

      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">


          <?php

          if (isset($_GET['action'])) {
            Session::destroy();
            header("location: index.php");
            exit();
          }

          $login = Session::get("Login");
          if ($login == true) { ?>

            <li class="nav-item <?php if ($page == 'profile') {
                                  echo 'active';
                                } ?> ">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item <?php if ($page == 'exam') {
                                  echo 'active';
                                } ?> ">
              <a class="nav-link" href="exam.php">Exam</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?action=logout">Logout</a>
            </li>

          <?php } else { ?>

            <li class="nav-item <?php if ($page == 'home') {
                                  echo 'active';
                                } ?> ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?php if ($page == 'register') {
                                  echo 'active';
                                } ?> ">
              <a class="nav-link" href="register.php">Register</a>
            </li>

          <?php } ?>


        </ul>
      </div>
    </nav>
    <!-- End Navbar -->