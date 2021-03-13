<?php
include_once '../lib/Session.php';
Session::checkAdminLogin();
?>

<?php // Cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php
$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/Session.php');
include_once($filePath . '/../lib/Database.php');
include_once($filePath . '/../classes/Admin.php');

$admin = new Admin();
?>

<?php
if (isset($_POST['submit'])) {
  $adminData = $admin->getAdminData($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin : Login Page</title>
  <!-- Fontawesome Css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">


  <div class="login-form">
    <form action="" method="post" class="">
      <h2>Welcome Back</h2>

      <?php
      if (isset($adminData)) {
        echo $adminData;
      }
      ?>

      <div class="form-group d-flex">
        <i class="fas fa-user    icon"></i>
        <input type="text" name="adminUsername" class="form-control" placeholder="Username...">
      </div>
      <div class="form-group d-flex">
        <i class="fas fa-key    icon"></i>
        <input type="password" name="adminPassword" id="" class="form-control" placeholder="Password...">
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-block">
      <div class="text-center mt-3">
        <a class="small text-white" href="forgot-password.php">Forgot Password?</a>
      </div>

    </form>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="./dist/bootstrap/bootstrap.min.js"></script>
</body>

</html>