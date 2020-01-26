<?php
include_once '../classes/dbh.class.php';
include_once '../classes/users.class.php';
include_once '../classes/usersview.class.php';
include_once '../classes/userscontroller.class.php';
// check if user clicked login button
if (isset($_POST['login-submit'])) {
    
    $useremailOrName = $_POST['mailorname'];
    $userpassword = $_POST['password'];

    if (empty($useremailOrName) || empty($userpassword)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $user = new UsersController();
        $user->loginUser($useremailOrName, $userpassword);
    }
} else {
    header("Location: ../index.php");
    exit();
}
