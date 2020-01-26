<?php
include_once '../classes/dbh.class.php';
include_once '../classes/users.class.php';
include_once '../classes/usersview.class.php';
include_once '../classes/userscontroller.class.php';
$user = new UsersController();
$user->logoutUser();
