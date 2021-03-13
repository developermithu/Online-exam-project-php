<?php include 'include/header.php'; ?>

<!-- Add Question -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $addQuestion = $exam->addQuestion($_POST);
}

$totalQuestion = $exam->getTotalQuestionNumber();
$nextQuestionNumber = $totalQuestion + 1;
?>

<!-- Delete Question -->
<?php
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  $deleteQuestion = $exam->deleteQuestionById($delete_id);
}
?>

<section class="question-page py-5">

  <div class="add-question mt-5 float-right mr-3 mb-3 ">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Add Question
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body py-3">

          <!-- form -->
          <form action="" method="post">
            <div class="form-group w-100">
              <label><strong>Question Number</strong></label>
              <input type="number" class="form-control" name="questionNumber" value="<?php

                              if (isset($nextQuestionNumber)) {
                                echo $nextQuestionNumber;
                              } ?>">

            </div>
            <div class="form-group w-100">
              <label><strong>Question</strong></label>
              <input type="text" class="form-control" name="question" required>
            </div>
            <div class="form-group w-100">
              <label><strong>Option 1</strong></label>
              <input type="text" class="form-control" name="option1" required>
            </div>
            <div class="form-group w-100">
              <label><strong>Option 2</strong></label>
              <input type="text" class="form-control" name="option2" required>
            </div>
            <div class="form-group w-100">
              <label><strong>Option 3</strong></label>
              <input type="text" class="form-control" name="option3" required>
            </div>
            <div class="form-group w-100">
              <label><strong>Option 4</strong></label>
              <input type="text" class="form-control" name="option4" required>
            </div>
            <div class="form-group w-100">
              <label><strong>Right Answer Number</strong></label>
              <input type="number" class="form-control" name="rightAnswer" required>
            </div>
            <div class="form-group w-100">
              <select class="form-control" name="">
                <option value="" selected> Select Category</option>
                <option>PHP</option>
                <option>HTML</option>
                <option>CSS</option>
              </select>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          <!-- form -->

        </div>
      </div>
    </div>
  </div>


  <?php
  if (isset($addQuestion)) {
    echo $addQuestion;
  }

  if (isset($deleteQuestion)) {
    echo $deleteQuestion;
  }
  ?>


  <!-- User Table -->
  <table class="table table-bordered mt-2 pb-5 text-center">
    <tr class="bg-info text-white">
      <th>No</th>
      <th>Question</th>
      <th>Action</th>
    </tr>

    <?php
    $getQuestion = $exam->getQuestion();
    if ($getQuestion) {
      $i = 0;
      while ($result = $getQuestion->fetch_assoc()) {
        $i++;
    ?>

        <tr>
          <td scope="row"><?php echo $i; ?></td>
          <td><?php echo $result['question'] ?></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete question?') " href="?delete_id=<?php echo $result['questionNumber'] ?> ">Delete</a>
          </td>
        </tr>

    <?php }
    } ?>

  </table>


</section>

<?php include 'include/footer.php'; ?>