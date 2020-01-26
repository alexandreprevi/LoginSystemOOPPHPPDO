<?php

namespace User;

class UsersView extends Users
{
    public function showLoggedIn($username, $useremail)
    {
        echo '  <div class="container">
                <h2 class="text-center m-5">Hello ' . $username . '</h2>
                <h3 class="text-center m-4">' . $useremail . '<h3>
                <form class="text-center" action="/Loginsystemuppgift/includes/logout.inc.php" method="post">
                    <button type="submit" class="btn btn-warning" name="logout-submit">Logout</button>
                </form>
            </div>';
    }

    public function showAlert($errorType)
    {
        echo '<div class="container">';
        if ($errorType == "emptyfields") {
            echo '<div class="alert alert-danger">Fill in all fields!</div>';
        } elseif ($errorType == "invaliduidmail") {
            echo '<div class="alert alert-danger">Invalid username and e-mail!</div>';
        } elseif ($errorType == "invaliduid") {
            echo '<div class="alert alert-danger">Invalid username!</div>';
        } elseif ($errorType == "invalidmail") {
            echo '<div class="alert alert-danger">Invalid e-mail!</div>';
        } elseif ($errorType == "userpasswordcheck") {
            echo '<div class="alert alert-danger">Your passwords do not match!</div>';
        } elseif ($errorType == "usertaken") {
            echo '<div class="alert alert-danger">Username is already taken!</div>';
        } elseif ($errorType == "wrongpwd") {
            echo '<div class="alert alert-danger">Invalid password</div>';
        } elseif ($errorType == "nouser") {
            echo '<div class="alert alert-danger">Invalid username</div>';
        }
        echo '</div>';
    }

    public function showSuccess()
    {
        echo '<div class="container">
        <div class="alert alert-success">Register successfull!</div>
        </div>';
    }

    public function displayLoginForm()
    {
        echo '  <div class="container">
                <div class="form-group m-2">
                    <h1>Login</h1>
                    <form action="/Loginsystemuppgift/includes/login.inc.php" class="m-2" method="post">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input class="form-control mb-2" type="text" name="mailorname" placeholder="Username/Email">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input class="form-control mb-2" type="password" name="password" placeholder="Password">
                        <button class="btn btn-primary" type="submit" name="login-submit">Login</button>
                    </form>
                    <a class="ml-2" href="/Loginsystemuppgift/register.php">Register</a>
                </div>
            </div>';
    }

    public function displayRegisterForm()
    {
        echo '  <div class="container">
                    <form class="form-group m-2" action="/Loginsystemuppgift/includes/register.inc.php" method="post">
                        <h1>Register</h1>
                        <input class="form-control mb-2" type="text" name="username" placeholder="Username">
                        <input class="form-control mb-2" type="email" name="useremail" placeholder="E-mail">
                        <input class="form-control mb-2" type="password" name="userpassword" placeholder="Password">
                        <input class="form-control mb-2" type="password" name="userpasswordRepeat" placeholder="Repeat password">
                        <button class="btn btn-primary" type="submit" name="register-submit">Register</button>
                    </form>
                    <a class="ml-2" href="/Loginsystemuppgift">Login</a>
                </div>';
    }
}
