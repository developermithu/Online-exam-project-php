<?php
$page = 'exam';
include 'inc/header.php';  //header er por checkSession dite hobe
Session::checkSession();
?>

<main class="py-5" id="exam-page">
    <div class="title bg-light py-2 text-center w-50 m-auto">
        Welcome To Online Exam - Start Test
    </div>

    <section class="user-login py-5">
        <div class="row mx-3">
            <div class="col-md-6 px-3">
                <img src="./vendor/img/online.jpg" alt="" class="img-fluid">
            </div>

            <div class="col-md-6">
                <div class="text-center mt-3">
                    <h3>Start Test</h3>
                    <hr>
                    <div class="mt-3">
                        <a href="start_test.php" class="bg-secondary text-white d-block w-100 py-1 text-decoration-none">Start now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include './inc/footer.php' ?>