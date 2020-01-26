<?php
require 'header.php';
?>

<main>
<?php
$user = new UsersView();
    isset($_GET['error']) ? $user->showAlert($_GET['error']) : '';
    isset($_SESSION['userId']) ? $user->showLoggedIn($_SESSION['username']) : $user->displayLoginForm();
?>
</main>

<?php
require 'footer.php';
?>