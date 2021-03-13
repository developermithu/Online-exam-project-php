<?php
$page = 'exam';
include 'inc/header.php';  //header er por checkSession dite hobe
Session::checkSession();
$question = $exam->getTestQuestion();
$total = $exam->getTotalQuestionNumber();
?>

<main class="py-5" id="start-test-page">
    <div class="title py-2 text-center w-50 m-auto">
        Welcome To Online Exam
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-3 ">
            <div class="content">
                <h3>Test Your Knowledge</h3>
                <hr>
                <p>This is multiple choice question to test your knowledge</p>
                <ul>
                    <li><strong>Number of Question:</strong> <?php echo $total; ?> </li>
                    <li><strong>Question Type:</strong> Multiple Choice</li>
                </ul>
                <a href="test.php?qnumber=<?php echo $question['questionNumber']; ?> " class=" bg-secondary text-center text-white d-block w-100 py-2"> Start Test </a>
            </div>
        </div>
    </div>

</main>


<?php include './inc/footer.php' ?>