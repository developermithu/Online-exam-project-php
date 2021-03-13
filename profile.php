<?php
$page = 'profile';
include './inc/header.php';
Session::checkSession();
$userid = Session::get("userid");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $updateUserProfile = $user->updateUserProfile($userid, $_POST);
}
?>

<main class="py-5">
  <div class="form">

    <?php
    $userProfile = $user->getUserProfileData($userid);
    if ($userProfile) {
      while ($row = $userProfile->fetch_assoc()) { ?>

        <form action="" method="POST" class="w-75 m-auto py-5">
          <div class="register-img">
            <img src="./vendor/img/register.jpg" alt="student" class="img-fluid" />
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Email </strong></label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
            </div>
          </div>
          
          <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">
              <strong>Gender </strong>
            </label>
            <div class="col-sm-8">
              <select class="form-control" name="">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
      -->

          <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">
              <strong>City </strong>
            </label>
            <div class="col-sm-8">
              <select class="form-control" name="division" >
              <option value="Dhaka"></option>
              </select>
            </div>
          </div> -->

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Institute</strong></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="institute" value="<?php echo $row['institute']; ?>" />
            </div>
          </div>
          <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Image </strong></label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="image" />
            </div>
          </div> -->
          <div class="register-btn mt-4">
            <input type="submit" value="Update" class="btn btn-success" />
            <a href="exam.php" class="btn btn-secondary ml-3">Back</a>
          </div>
        </form>

    <?php }  }  ?>

  </div>
</main>


<?php include './inc/footer.php' ?>