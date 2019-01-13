<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * register page
 */

include_once('includes/a_config.php');

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($db->usernameExists($username)) {
        $error = "Username already exists.";
    } else {
        $ret = $db->insertUser($username, $password);
        if ($ret) {
            header('Location: /login.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("includes/head-tag-contents.php"); ?>
</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Register
				</span>
            <form class="login100-form validate-form p-b-33 p-t-5" action="register.php" method="post">
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="User name">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="alert-info100">
                    <span class=""> <?php if (isset($error)) {
                            echo "$error";
                        } ?> </span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <input type="submit" name="register" value="register" class="login100-form-btn">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once('includes/footer.php'); ?>
<script src="js/main.js"></script>

</body>
</html>
