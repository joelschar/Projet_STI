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

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $new_username = $_POST['username'];
    $role = $_POST['role'];
    if($_POST['activate'] == 1){
        $activate = 1;
    }
    else{
        $activate = 0;
    }


    // check if username changes, if so is it available
    $username_change_possible = true;
    $user = $db->getUserById($id);
    if(! $user->username == $new_username) {
        if ($this->usernameExists($new_username)) {
            $change_success = false;
            $username_change_possible = false;
            $error = "Username already exists.";
        }
    }
    if($username_change_possible){
        $change_success = $db->updateUser($id, $new_username, $role, $activate);
    }

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

        <div class="view">
            <div class="viewContent">
                <?php
                if (isset($_GET['user_id'])) {
                    $id = $_GET['user_id'];

                    $user = $db->getUserById($id);

                    ?>
                    <form action="admin.php?user_id=<?php echo $id ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $user->id ?>" />
                        Username : <input class="input" type="text" name="username" value="<?php echo $user->username ?>"><br>
                        Role :
                        <select name="role">
                            <option value="<?php echo Role::Collaborator?>" <?php if ($user->role == Role::Collaborator) echo "selected" ?>>
                                Collaborator
                            </option>
                            ";
                            <option value="<?php echo Role::Administrator?>" <?php if ($user->role == Role::Administrator) echo "selected" ?>>
                                Administrator
                            </option>
                            ";
                        </select><br>
                        Activate: <input type="checkbox" name="activate"
                                         value="1"<?php if ($user->activate == 1) echo "checked" ?>><br>
                        <button type="submit">Apply</button>
                    </form>
                    <a href="admin.php?delete&user_id=<?php echo $user->id ?>">Delete User</a>

                    <?php
                    if (isset($change_success)) {
                        echo "<br>";
                        if ($change_success) {
                            echo "Change successfully applied";
                        } else {
                            echo "Error change not applied";
                            echo $error;
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