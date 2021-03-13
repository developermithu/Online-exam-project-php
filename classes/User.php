<?php
$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/Database.php');
include_once($filePath . '/../lib/Session.php');
include_once($filePath . '/../helpers/Format.php');

class User
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    //==========  For Front End view  ==========//
    public function userRegistration($name, $email, $password, $institute, $division)
    {
        $name            = $this->fm->validation($name);
        $email            = $this->fm->validation($email);
        $password    = $this->fm->validation($password);
        $institute       = $this->fm->validation($institute);
        $division       = $this->fm->validation($division);

        $name           = mysqli_real_escape_string($this->db->link, $name);
        $email           = mysqli_real_escape_string($this->db->link, $email);
        $institute      = mysqli_real_escape_string($this->db->link, $institute);
        $division      = mysqli_real_escape_string($this->db->link, $division);

        if (empty($name) || empty($email) || empty($password) || empty($institute) || empty($division)) {
            echo '<div class="alert alert-danger alert-dismissible fade show"
            role="alert"><strong>Field must not be empty!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            exit();
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo '<div class="alert alert-warning alert-dismissible fade show"
            role="alert"><strong>Invalid Email Address!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            exit();
        }else {
            $checkQuery = " SELECT * FROM `tbl_examinee` WHERE `email` = '$email' ";
            $checkResult = $this->db->select($checkQuery);
            if ($checkResult == true) {
                echo '<div class="alert alert-info alert-dismissible fade show"
                role="alert"><strong>Email Address Alredy Exist!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                exit();
            } else {
                $password   = mysqli_real_escape_string($this->db->link, sha1(md5($password)));
                $query = "INSERT INTO `tbl_examinee` (`name`, `email`, `password`, `institute`, `division`) VALUES ('$name', '$email', '$password', '$institute', '$division') ";
                $result = $this->db->insert($query);
                if ($result == true) {
                    echo '<div class="alert alert-success alert-dismissible fade show"
                    role="alert"><strong>Registration was successfull!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    exit();
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show"
                    role="alert"><strong>Somthing went wrong!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    exit();
                }
            }
        }
    } //userRegistration

    public function userLogin($email, $password)
    {
        $email         = $this->fm->validation($email);
        $password = $this->fm->validation($password);
        $email         = mysqli_real_escape_string($this->db->link, $email);

        if (empty($email) || empty($password)) {
            echo 'empty';
            exit();
        } else {
            $password = mysqli_real_escape_string($this->db->link, sha1(md5($password)));
            $query = "SELECT * FROM `tbl_examinee` WHERE `email` = '$email' AND `password` = '$password' ";
            $result = $this->db->select($query);
            if ($result == true) {
                $value = $result->fetch_assoc();
                Session::init();
                Session::set("Login", true);
                Session::set("userid", $value['id']);
                Session::set("userName", $value['name']);
                Session::set("userEmail", $value['email']);
                Session::set("userPassword",  $value['password']);
                Session::set("userInstitute",  $value['institute']);
            } else {
                echo 'error';
                exit();
            }
        }
    } //userLogin

    public function getUserProfileData($userid)
    {
        $query = "SELECT * FROM `tbl_examinee` WHERE `id`= '$userid' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateUserProfile($userid, $data)
    {
        $name          = $this->fm->validation($data['name']);
        $email          = $this->fm->validation($data['email']);
        $institute     = $this->fm->validation($data['institute']);
        $division     = $this->fm->validation($data['division']);

        $name          = mysqli_real_escape_string($this->db->link, $data['name']);
        $email          = mysqli_real_escape_string($this->db->link, $data['email']);
        $institute     = mysqli_real_escape_string($this->db->link, $data['institute']);
        $division     = mysqli_real_escape_string($this->db->link, $data['division']);

        $query = "UPDATE `tbl_examinee` SET
         `name` = '$name',
         `email` = '$email',
         `institute` = '$institute',
         `division` = '$division'
        WHERE `id` = '$userid'  ";
        $update_row = $this->db->update($query);
    }




    //==========  For Admin panel  ==========//
    public function userInsert($data)
    {
        $name             = $this->fm->validation($data['name']);
        $username   = $this->fm->validation($data['username']);
        $email              = $this->fm->validation($data['email']);

        $name            = mysqli_real_escape_string($this->db->link, $data['name']);
        $username    = mysqli_real_escape_string($this->db->link, $data['username']);
        $email             = mysqli_real_escape_string($this->db->link, $data['email']);

        if (empty($name) || empty($username) || empty($email)) {
            $msg =  '<div class="alert alert-danger alert-dismissible fade show"
            role="alert"><strong>Field must not be empty!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return $msg;
        } else {

            $query = "INSERT INTO `tbl_user` (`name`, `username`, `email`) VALUES ('$name', '$username', '$email'); ";
            $result = $this->db->insert($query);
            if ($result) {
                $msg =  '<div class="alert alert-succes alert-dismissible fade show"
                role="alert"><strong>New user added successfully!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                return $msg;
            } else {
                $msg =  '<div class="alert alert-danger alert-dismissible fade show"
                role="alert"><strong>Something went wrong!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                return $msg;
            }
        }
    } //userinsert 

    public function getUserData()
    {
        $query = "SELECT * FROM `tbl_user` ORDER BY `userid` DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    // Dsable, Enable or remove User Account
    public function disableUser($id)
    {
        $query = "UPDATE `tbl_user` SET `status` = '1'  WHERE `userid` = '$id'  ";
        $update_row = $this->db->update($query);
    }

    public function enableUser($id)
    {
        $query = "UPDATE `tbl_user` SET `status` = '0'  WHERE `userid` = '$id'  ";
        $update_row = $this->db->update($query);
    }

    public function removeUser($id)
    {
        $query = "DELETE  FROM `tbl_user` WHERE `userid` = '$id' ";
        $delete_row = $this->db->delete($query);
    }
}//admin 
