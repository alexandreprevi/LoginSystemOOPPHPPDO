<?php
include_once '../classes/dbh.class.php';
include_once '../classes/users.class.php';
include_once '../classes/usersview.class.php';
include_once '../classes/userscontroller.class.php';
// check if user clicked register button
if (isset($_POST['register-submit'])) {
    
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];
    $userpasswordRepeat = $_POST['userpasswordRepeat'];

    if (empty($username) || empty($useremail) || empty($userpassword) || empty($userpasswordRepeat)) {
        header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$useremail);
        exit();
    } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
        header("Location: ../register.php?error=invalidmailuid");
        exit();
    } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&mail=".$useremail);
        exit();
    } elseif ($userpassword !== $userpasswordRepeat) {
        header("Location: ../register.php?error=userpasswordcheck&mail=".$useremail."&uid=".$username);
        exit();
    } else {
        $user = new UsersController();
        $user->createUser($username, $useremail, $userpassword, $userpasswordRepeat);
    }
} else {
    header("Location: ../register.php");
    exit();
}
