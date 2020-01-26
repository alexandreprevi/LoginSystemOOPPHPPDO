<?php
require 'header.php';
?>
<main>
    <?php
    $user = new UsersView();
    isset($_GET['error']) ? $user->showAlert($_GET['error']) : '';
    (isset($_GET['register']) && $_GET['register'] == "success") ? $user->showSuccess() : '';
    $user->displayRegisterForm();
    ?>
    
</main>
<?php
require 'footer.php';
?>