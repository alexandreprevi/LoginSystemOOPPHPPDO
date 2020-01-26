<?php
include_once '../classes/Database/dbh.class.php';
include_once '../classes/User/users.class.php';
include_once '../classes/User/usersview.class.php';
include_once '../classes/User/userscontroller.class.php';
// check if user clicked login button
if (isset($_POST['login-submit'])) {
    $useremailOrName = $_POST['mailorname'];
    $userpassword = $_POST['password'];

    if (empty($useremailOrName) || empty($userpassword)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $user = new User\UsersController();
        $user->loginUser($useremailOrName, $userpassword);
    }
} else {
    header("Location: ../index.php");
    exit();
}
