<?php
class UsersView extends Users
{
    public function showUser($name)
    {
        $results = $this->getUser($name);
        echo "Full name: " . $results[0]['users_firstname'] . " " . $results[0]['users_lastname'] . "<br>";
        echo "Date of birth: " . $results[0]['users_dateofbirth'];
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
        }
        echo '</div>';
    }

    public function showSuccess()
    {
        echo '<div class="container">
        <div class="alert alert-success">Register successfull!</div>
        </div>';
    }
}