<?php
$page = 'exam';
include 'inc/header.php';  //header er por checkSession dite hobe
Session::checkSession();
$total = $exam->getTotalQuestionNumber();
?>

<main class="py-5" id="answer-page">
    <div class="title py-2 text-center w-50 m-auto">
        All Question & Answer : <?php echo $total; ?>
    </div>

    <div class="answer-list">

        <table class="mt-3">
            <?php
            $getQuestion = $exam->getQuestion();
            if ($getQuestion) {
                while ($question = $getQuestion->fetch_assoc()) { ?>

                    <tr>
                        <td>
                            <h5>
                                Que <?php echo $question['questionNumber']; ?>:
                                <?php echo $question['question']; ?>
                            </h5>
                        </td>
                    </tr>

                    <?php
                    $qnumber = $question['questionNumber'];
                    $optionAns = $exam->getAnswerOption($qnumber);
                    if ($optionAns) {
                        while ($result = $optionAns->fetch_assoc()) { ?>

                            <tr>
                                <td>
                                    <input type="radio">
                                    <?php
                                    if ($result['rightAnswer'] == '1') {
                                        echo "<span style='color:blue;font-weight:600'>" . $result['option'] . "</span>";
                                    } else {
                                        echo $result['option'];
                                    }
                                    ?>
                                </td>
                            </tr>

            <?php }
                    }
                }
            } ?>
        </table>

        <a href="start_test.php" class=" bg-secondary text-center text-white d-block w-100 py-2 mt-3"> Start Again </a>
    </div>
</main>

<?php include './inc/footer.php' ?>