<?php 
  $page = 'register';
  include './inc/header.php' 
?>

<main class="py-5">
  <div class="form register-form">

    <!-- form -->
    <form action="" method="POST" class="w-75 m-auto py-5" id="myform">

<!-- Show Error Msg  -->
    <div id="showmsg"></div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Name </strong></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="name" id="name" placeholder="Your Name.." />
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Email </strong></label>
        <div class="col-sm-8">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email.." required/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Password </strong></label>
        <div class="col-sm-8">
          <input type="password" class="form-control" name="password" id="password" placeholder="Your Password..">
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
      </div> -->

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">
          <strong>City </strong>
        </label>
        <div class="col-sm-8">
          <select class="form-control" name="division" id="division">
            <option selected disabled>Select Division</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong ">Chittagong</option>
            <option value="Rajshahi ">Rajshahi</option>
            <option value="Barishal">Barishal</option>
            <option value="Mymensingh ">Mymensingh</option>
            <option value="Rangpur">Rangpur</option>
          </select>
        </div>
      </div> 

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Institute</strong></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="institute" id="institute" placeholder=" University or College.." />
        </div>
      </div>

      <div class="register-btn mt-4">
        <input type="submit" name="submit" value="Register" class="btn btn-primary" id="submitBtn"/>
        <input type="reset" name="reset" value="Reset" class="btn btn-danger ml-2"/>
      </div>


      <div class="mt-4 ml-5 new-user">
                <h6>Already Register? <a href="index.php">Login</a> Now </h6>
      </div>


    </form>
  </div>
</main>


<?php include './inc/footer.php' ?>