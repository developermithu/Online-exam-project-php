<?php

$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../classes/User.php');

$user = new User();

// For User Registration
$name          = $_POST['name'];
$email          = $_POST['email'];
$password  = $_POST['password'];
$institute     = $_POST['institute'];
$division     = $_POST['division'];

$userRegi = $user->userRegistration($name, $email, $password, $institute, $division);
