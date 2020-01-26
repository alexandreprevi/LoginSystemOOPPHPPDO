<?php
include_once '../classes/Database/dbh.class.php';
include_once '../classes/User/users.class.php';
include_once '../classes/User/usersview.class.php';
include_once '../classes/User/userscontroller.class.php';
$user = new User\UsersController();
$user->logoutUser();
