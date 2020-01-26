<?php
require 'header.php';
?>

<main>
<?php
if (isset($_SESSION['userId'])) {
    echo '  <div class="container">
                <h2 class="text-center m-5">You are logged in</h2>
                <form class="text-center" action="/Loginsystemuppgift/includes/logout.inc.php" method="post">
                    <button type="submit" class="btn btn-warning" name="logout-submit">Logout</button>
                </form>
            </div>';
} else {
    if (isset($_GET['error'])) {
        echo '<div class="container">';
        if ($_GET['error'] == "wrongpwd") {
            echo '<div class="alert alert-danger">Invalid password</div>';
        } elseif ($_GET['error'] == "nouser") {
            echo '<div class="alert alert-danger">Invalid username</div>';
        } elseif ($_GET['error'] == "emptyfields") {
            echo '<div class="alert alert-danger">Username and password required</div>';
        }
    }
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
?>
</main>

<?php
require 'footer.php';
?>