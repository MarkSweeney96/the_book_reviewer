<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';

if (!is_logged_in()) {
    header("Location: login_form.php");
}

$user = $_SESSION['user'];

if ($user->role_id != 2) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Manager home page</h1>
                    <?php
                    echo '<h2>Hello, '.$user->username.'</h2>';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
