<?php
include_once '../classes/Database/dbh.class.php';
include_once '../classes/User/users.class.php';
include_once '../classes/User/usersview.class.php';
include_once '../classes/User/userscontroller.class.php';

// check if user clicked register button
if (isset($_POST['register-submit'])) {
    
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];
    $userpasswordRepeat = $_POST['userpasswordRepeat'];

    $user = new User\UsersController();
    $user->createUser($username, $useremail, $userpassword, $userpasswordRepeat);
} else {
    header("Location: ../register.php");
    exit();
}
