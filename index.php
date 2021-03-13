<?php
$page = 'home';
include './inc/header.php'
?>

<main class="py-5">
  <div class="title bg-light py-2 text-center w-50 m-auto">
    Online Exam System - User Login
  </div>

  <section class="user-login py-5">
    <div class="row px-3">
      <div class="col-md-6 px-3">
        <img src="./vendor/img/pic1.png" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 px-3">

        <!-- form -->
        <form action="" method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-8 ml-3">
              <input type="email" class="form-control" name="email" placeholder="Email.." id="email">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><strong>Password</strong></label>
            <div class="col-sm-8 ml-3">
              <input type="password" class="form-control" name="password" placeholder="Password.." id="password">
            </div>
          </div>
          <div class="login-btn">
            <input type="submit" value="Login" class="btn btn-primary px-4" id="loginBtn">
          </div>
          <div class="mt-3 new-user">
            <h6>New user? <a href="register.php">Register</a> Now </h6>
          </div>

          <!-- show error message -->
          <div style="display: none;" class=" empty mt-3 mr-4 alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sorry! &nbsp;</strong>Field must not be empty.
          </div>
          <div style="display: none;" class=" error mt-3 mr-4 alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops! &nbsp;</strong>Email or Password not matched. 
          </div>

        </form>


      </div>
    </div>
  </section>
</main>


<?php include './inc/footer.php' ?>