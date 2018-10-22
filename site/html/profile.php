<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * User Profile page. A user can change his password here.
 */

include_once('includes/a_config.php');
include("includes/session.php");

if(isset($_POST['password'])){
    $username = $_SESSION['login'];
    $new_password = $_POST['password'];

    $change_success = $db->updatePassword($username, $new_password);
}

$current_user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("includes/head-tag-contents.php"); ?>
</head>
<body>

<div class="mainContainer container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="LeftContainer ">
        <?php include('includes/navbar.php') ?>
    </div>
    <div class="RightContainer ">
        <div class="view">
            <div class="viewContent">
                <div>
                    <p> Username :  <?php echo $current_user->username ?></p>
                </div>
                <div>
                    <p> Role :  <?php echo Role::getString($current_user->role) ?></p>
                </div>

                <!-- Print input field for password and submit button if change password is clicked -->
                <?php if(isset($_GET['ChangePassword'])){ ?>
                    <form action="profile.php" method="post">
                        Password : <input class="input100" type="text" name="password" value="<?php echo $db->getPassword($current_user->username) ?>"><br>
                        <button type="submit">Apply</button>
                    </form>

                <?php }else{ ?>

                    <div class="btn">
                        <a href="?ChangePassword">Change password</a>
                    </div>

                <?php
                    if(isset($change_success)){
                        echo "<br>";
                        if($change_success){
                            echo "Change successfully applied";
                        }else{
                            echo "Error, change not applied";
                        }
                    }
                } ?>

            </div>
        </div>
    </div>
</div>


<?php include_once('includes/footer.php'); ?>
<script src="js/main.js"></script>

</body>
</html>