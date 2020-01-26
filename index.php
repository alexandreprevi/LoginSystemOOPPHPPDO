<?php
require 'header.php';
?>

<main>
<?php
$user = new User\UsersView();
    isset($_GET['error']) ? $user->showAlert($_GET['error']) : '';
    isset($_SESSION['userId']) ? $user->showLoggedIn($_SESSION['username'], $_SESSION['useremail']) : $user->displayLoginForm();
?>
</main>

<?php
require 'footer.php';
?>
