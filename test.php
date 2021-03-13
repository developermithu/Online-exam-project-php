<?php
$page = 'exam';
include 'inc/header.php';  //header er por checkSession dite hobe
Session::checkSession();

if (isset($_GET['qnumber'])) {
    $qnumber = (int) $_GET['qnumber'];
} else {
    header("location: exam.php");
}

$total = $exam->getTotalQuestionNumber();
$question = $exam->getQuestionByNumber($qnumber);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $processData = $process->processData($_POST);
}

?>

<main class="py-5" id="start-test-page">
    <div class="title py-2 text-center w-50 m-auto">
        Question <?php echo $question['questionNumber']; ?> of <?php echo $total; ?>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-3 ">

            <!-- form -->
            <form action="" method="POST">
                <h4>
                    Que <?php echo $question['questionNumber']; ?>:
                    <?php echo $question['question']; ?>
                </h4>
                <table class="mt-3">

                    <?php
                    $optionAns = $exam->getAnswerOption($qnumber);
                    if ($optionAns) {
                        while ($result = $optionAns->fetch_assoc()) { ?>

                            <tr>
                                <td>
                                    <input type="radio" name="answer" value=" <?php echo $result['id']; ?> ">
                                    <?php echo $result['option']; ?>
                                </td>
                            </tr>

                    <?php }
                    } ?>

                    <tr>
                        <td>
                            <input type="submit" name="submit" class="btn btn-sm btn-secondary mt-3" value="Next Question">
                            <input type="hidden" name="number" value="<?php echo $qnumber; ?> ">
                        </td>
                    </tr>

                </table>
            </form>

        </div>
    </div>

</main>


<?php include './inc/footer.php' ?>