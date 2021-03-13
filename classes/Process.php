<?php
$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/Session.php');
include_once($filePath . '/../lib/Database.php');
include_once($filePath . '/../helpers/Format.php');

class Process
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function processData($data)
    {
        $selected_ans    = $this->fm->validation($data['answer']);
        $hiddenNumber = $this->fm->validation($data['number']);

        $selected_ans    = mysqli_real_escape_string($this->db->link, $selected_ans);
        $hiddenNumber = mysqli_real_escape_string($this->db->link, $hiddenNumber);

        $next = $hiddenNumber + 1;

        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = '0';
        }

        $total = $this->getTotal();
        $right = $this->rightAnswerOption($hiddenNumber);

        if ($right == $selected_ans) {
            $_SESSION['score']++;
        }
        if ($hiddenNumber == $total) {
            header("Location: result.php");
            exit();
        } else {
            header("Location: test.php?qnumber=" . $next);
        }
    } //processData

    private function getTotal()
    {
        $query = "SELECT * FROM `tbl_question` ";
        $select_row = $this->db->select($query);
        $totalNumber = $select_row->num_rows;   //not   num_row();
        return $totalNumber;
    }

    private function rightAnswerOption($hiddenNumber)
    {
        $query = "SELECT * FROM `tbl_answer` WHERE `questionNumber` = '$hiddenNumber' AND 
        `rightAnswer` = '1'  ";
        $getData = $this->db->select($query)->fetch_assoc();
        $result = $getData['id'];
        return $result;
    }
} //process class