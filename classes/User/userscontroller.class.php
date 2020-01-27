<?php

namespace User;

class UsersController extends Users
{
    public function createUser($username, $useremail, $userpassword, $userpasswordRepeat)
    {
        if ($this->checkInputsRegistration($username, $useremail, $userpassword, $userpasswordRepeat)) {
            if ($this->checkIfTakenUsername($username)) {
                $this->setUser($username, $useremail, $userpassword, $userpasswordRepeat);
            }
        }
    }

    public function loginUser($useremailOrName, $userpassword)
    {
        if (empty($useremailOrName) || empty($userpassword)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        $this->login($useremailOrName, $userpassword);
    }

    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
}
