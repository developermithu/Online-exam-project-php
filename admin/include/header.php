<?php 
include_once ('../lib/Session.php');
Session::checkAdminSession();
include_once ('../lib/Database.php');
include_once ('../helpers/Format.php');
include_once ('../classes/User.php');
include_once ('../classes/Exam.php');

$db      = new Database();
$fm     = new Format();
$user  = new User();
$exam = new Exam();


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
  <title>Admin Panel :: Online Exam System</title>
  <meta name="description" content="This is a online exam system website where you will test your preparation for BCS,  University, College etc." />

  <!-- Fontawesome -->
  <link rel="stylesheet" href="fontawesome/all.min.css">
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="./dist/bootstrap/bootstrap.min.css">
  <!-- Custom Css -->
<link rel="stylesheet" href="style.css">

</head>
<body>


  <div class="container">
  <div class="main">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
      <a class="navbar-brand" href="index.php">Dashboard</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">
          <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
          </li>        
          <li class="nav-item">
            <a class="nav-link" href="question.php">Question</a>
          </li>        
          <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Admin
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Profile</a>
        <?php 
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
             Session::destroy();
             header("location: login.php");
         }
        ?>
                        <a class="dropdown-item" href="?action=logout">Logout</a>

                    </div>
                </li>    
        </ul>

      </div>
    </nav>
    <!-- End Navbar -->
