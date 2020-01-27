<?php

namespace User;

class Users extends \Database\Dbh
{
    protected function setUser($username, $useremail, $userpassword)
    {
    
        $sql = "INSERT INTO users(username, useremail, userpassword) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($userpassword, PASSWORD_DEFAULT);

        $stmt->execute([$username, $useremail, $hashedPwd]);

        header("Location: ../register.php?register=success");
        exit();
    }

    protected function checkIfTakenUsername($username)
    {
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);

        $row = $stmt->rowCount();
        
        if ($row > 0) {
            header("Location: ../register.php?error=usertaken");
            return false;
        } else {
            header("Location: ../register.php?success=userok");
            return true;
        }
    }

    protected function checkInputsRegistration($username, $useremail, $userpassword, $userpasswordRepeat)
    {
        if (empty($username) || empty($useremail) || empty($userpassword) || empty($userpasswordRepeat)) {
            header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$useremail);
            return false;
        } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
            header("Location: ../register.php?error=invalidmailuid");
            return false;
        } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.php?error=invalidmail&uid=".$username);
            return false;
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../register.php?error=invaliduid&mail=".$useremail);
            return false;
        } elseif ($userpassword !== $userpasswordRepeat) {
            header("Location: ../register.php?error=userpasswordcheck&mail=".$useremail."&uid=".$username);
            return false;
        } else {
            return true;
        }
    }


    protected function login($useremailOrName, $userpassword)
    {
        $sql = "SELECT * FROM users WHERE username = ? OR useremail = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$useremailOrName, $useremailOrName]);
        $result = $stmt->fetch();
        $row = $stmt->rowCount();
        if ($row > 0) {
            $pwdCheck = password_verify($userpassword, $result['userpassword']);
            if ($pwdCheck == false) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            } else {
                session_start();
                $_SESSION['userId'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['useremail'] = $result['useremail'];

                header("Location: ../index.php?login=success");
                exit();
            }
        } else {
            header("Location: ../index.php?error=nouser");
            exit();
        }
    }
}
