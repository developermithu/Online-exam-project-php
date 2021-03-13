<?php

$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/Database.php');
include_once($filePath . '/../lib/Session.php');
include_once($filePath . '/../helpers/Format.php');


class Exam
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addQuestion($data)
    {
        $questionNumber  = $this->fm->validation($data['questionNumber']);
        $question                = $this->fm->validation($data['question']);

        $questionNumber = mysqli_real_escape_string($this->db->link, $questionNumber);
        $question               = mysqli_real_escape_string($this->db->link, $question);

        $option = array();
        $option[1] = $data['option1'];
        $option[2] = $data['option2'];
        $option[3] = $data['option3'];
        $option[4] = $data['option4'];

        $rightAnswer = $data['rightAnswer'];

        $query = "INSERT INTO `tbl_question` (`questionNumber`, `question`) VALUES ('$questionNumber',  '$question' ) ";
        $insert_row = $this->db->insert($query);
        if ($insert_row) {
            foreach ($option as $key => $value) {   //$option = $option [array();]
                if ($value != "") {
                    if ($rightAnswer == $key) {
                        $query = "INSERT INTO `tbl_answer` (`questionNumber`, `rightAnswer`, `option`) VALUES ('$questionNumber', '1', '$value' ) ";
                    } else {
                        $query = "INSERT INTO `tbl_answer` (`questionNumber`, `rightAnswer`, `option`) VALUES ('$questionNumber', '0', '$value' ) ";
                    }
                    $insert_row = $this->db->insert($query);
                    if ($insert_row) {
                        continue;
                    } else {
                        die("Error.....");
                    }
                }
            }

            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Question Added Successfully!</strong> 
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                </button>
                             </div>';
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Somthing wnet wrong!</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            return $msg;
        }
    } //add Question

    // Delete Question
    public function deleteQuestionById($delete_id)
    {
        $tables = array("tbl_question", "tbl_answer");
        foreach ($tables as $table) {
            $query = "DELETE FROM $table WHERE `questionNumber` = '$delete_id' ";
            $result = $this->db->delete($query);
        }
    }

    public function getTotalQuestionNumber()
    {
        $query = "SELECT * FROM `tbl_question` ";
        $select_row = $this->db->select($query);
        $totalNumber = $select_row->num_rows;   //not   num_row();
        return $totalNumber;
    }

    public function getQuestion()
    {
        $query = "SELECT * FROM `tbl_question` ORDER BY `questionNumber` ASC  ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTestQuestion()
    {
        $query = "SELECT * FROM `tbl_question` ";
        $selected_row = $this->db->select($query);
        $result = $selected_row->fetch_assoc();
        return $result;
    }

    public function getQuestionByNumber($qnumber)
    {
        $query = "SELECT * FROM `tbl_question` WHERE `questionNumber` = '$qnumber' ";
        $selected_row = $this->db->select($query);
        $result = $selected_row->fetch_assoc();
        return $result;
    }

    public function getAnswerOption($qnumber)
    {
        $query = "SELECT * FROM `tbl_answer` WHERE `questionNumber` = '$qnumber' ";
        $result = $this->db->select($query);
        return $result;
    }
    
}//end Exam