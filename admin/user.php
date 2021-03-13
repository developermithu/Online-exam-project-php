<?php include 'include/header.php'; ?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addUser = $user->userInsert($_POST);
  }
?>

 <!-- Dsable, Enable or remove User Account -->
<?php 
  if (isset($_GET['disable_id'])) {
    $id = $_GET['disable_id'];
    $disableUser = $user->disableUser($id);
  }

  if (isset($_GET['enable_id'])) {
    $id = $_GET['enable_id'];
    $enableUser = $user->enableUser($id);
  }

  if (isset($_GET['remove_id'])) {
    $id = $_GET['remove_id'];
    $removeUser = $user->removeUser($id);
  }

?>


<section class="user-page py-5">

<!-- Button trigger modal -->
<div class="">
<button type="button" class="btn btn-primary  mr-3 mt-5 mb-2 float-right  " data-toggle="modal" data-target="#modelId">
  Add User
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="post">  
          <div class="form-group">
            <label> <strong>Name</strong> </label>
            <input type="text" class="form-control" name="name" placeholder="Name..." required>
          </div>
          <div class="form-group">
            <label> <strong>Username</strong> </label>
            <input type="text" class="form-control" name="username" placeholder="Username..." required>
          </div>
          <div class="form-group">
            <label> <strong>Email</strong> </label>
            <input type="email" class="form-control" name="email" placeholder="Email..." required>
          </div>

          <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save</button>
         </div>
        </form>

      </div>
    
    </div>
  </div>
</div>

<div class="msg"></div>
<?php 
  if (isset($addUser)) {
    echo $addUser;
  }
?>

<!-- User Table -->
<table class="table table-bordered mt-2 pb-5 text-center">
        <tr class="bg-info text-white">
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

<?php 
  $getUserData = $user->getUserData();
  if ($getUserData) {
    $i = 0;
    while ($result = $getUserData->fetch_assoc()) {
      $i++;
?>
        <tr>
            <td scope="row"><?php echo $i; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td>
                    <?php 
                        if ($result['status'] == '1')  { ?>
                          <span style="color: red;"><?php echo $result['username']; ?></span>
                        <?php }else {
                            echo $result['username'];
                     } ?>
            </td>

            <td><?php echo $result['email']; ?></td>
            <td>
              <?php 

               if ($result['status'] == '0') { ?>
                <a href="?disable_id=<?php echo $result['userid']; ?>" onclick="return confirm('Are you sure to enable?')" class="btn btn-secondary btn-sm">Disable</a> 
               <?php }else{ ?>
                  <a href="?enable_id=<?php echo $result['userid']; ?>" onclick="return confirm('Are you sure to disable?')" class="btn btn-info btn-sm">Enable</a>
            <?php   } ?>

            <a href="?remove_id=<?php echo $result['userid']; ?>" onclick="return confirm('Are you sure to remove?')" class="btn btn-danger btn-sm">Remove</a>
          </td>
        </tr>

    <?php }  } ?>

</table>


</section>

<?php include 'include/footer.php'; ?>