<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Administration pannel, only accessible by logged in users having Administrator Role.
 */

include_once('includes/a_config.php');
include("includes/session.php");

$current_user = $_SESSION['user'];

if (!$current_user->isRole(Role::Administrator)) {
    header('Location: profile.php'); // Redirecting To Home Page
}

if (isset($_GET['delete'])) {
    $id = $_GET['user_id'];
    $change_success = $db->deleteUserById($id);
}



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
        <div class="mailListWrap">
            <div class="btn">
                <a href="/admin.php?new_user">
                    New Collaborator
                </a>
            </div>
            <div class="mailList">
                <?php
                $user_list = $db->getAllUser();
                ?>
                <ul id="nav">
                    <?php

                    foreach ($user_list as $user) {
                        ?>
                        <li><a href="admin.php?user_id=<?php echo $user->id ?>"><?php echo $user->username ?></a>
                        </li><?php
                    } // end foreach
                    ?>
            </div>
        </div>
        <div class="view">
            <div class="viewContent">
                <?php
                if (isset($_GET['user_id'])) {
                     include('includes/change_user.php');
                }
                else if (isset($_GET['new_user'])){
                    include('includes/new_user.php');
                }
                ?>

            </div>
        </div>
    </div>
</div>


<?php include_once('includes/footer.php'); ?>
<script src="js/main.js"></script>

</body>
</html>