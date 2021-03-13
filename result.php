<?php
$page = 'exam';
include 'inc/header.php';  //header er por checkSession dite hobe
Session::checkSession();

?>

<main class="py-5" id="start-test-page">
    <div class="title py-2 text-center w-50 m-auto">
        You Have Done !
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-3 px-5 pb-4">
            <h5><strong>Congrats!</strong> You have just completed the test.</h5>
            <p><strong>Final Score :</strong>
                <?php
                if (isset($_SESSION['score'])) {
                    echo $_SESSION['score'];
                    unset($_SESSION['score']);
                }
                ?>
            </p>

            <a href="view_answer.php" class=" bg-secondary text-center text-white d-block w-100 py-2"> View Answer </a>
            <a href="start_test.php" class=" bg-secondary text-center text-white d-block w-100 py-2"> Start Again </a>
        </div>
    </div>

</main>


<?php include './inc/footer.php' ?>