<?php
require 'header.php';
?>

<main>
    <?php
    $user = new UsersView();
    if (isset($_GET['error'])) {
        $user->showAlert($_GET['error']);
    } elseif (isset($_GET['register']) && $_GET['register'] == "success") {
        $user->showSuccess();
    }
    ?>
    <div class="container">
    <form class="form-group m-2" action="/Loginsystemuppgift/includes/register.inc.php" method="post">
        <h1>Register</h1>
        <input class="form-control mb-2" type="text" name="username" placeholder="Username">
        <input class="form-control mb-2" type="email" name="useremail" placeholder="E-mail">
        <input class="form-control mb-2" type="password" name="userpassword" placeholder="Password">
        <input class="form-control mb-2" type="password" name="userpasswordRepeat" placeholder="Repeat password">
        <button class="btn btn-primary" type="submit" name="register-submit">Register</button>
    </form>
    <a class="ml-2" href="/Loginsystemuppgift">Login</a>
    </div>
</main>

<?php
require 'footer.php';
?>