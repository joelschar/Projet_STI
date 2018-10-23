<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * change collaborator windwow content
 */

$id = $_GET['user_id'];

$user = $db->getUserById($id);

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $new_username = $_POST['username'];
    $role = $_POST['role'];
    if ($_POST['activate'] == 1) {
        $activate = 1;
    } else {
        $activate = 0;
    }


    // check if username changes, if so is it available
    $username_change_possible = true;
    $user = $db->getUserById($id);
    if (!$user->username == $new_username) {
        if ($db->usernameExists($new_username)) {
            $change_success = false;
            $username_change_possible = false;
            $error = "Username already exists.";
        }
    }
    if ($username_change_possible) {
        $change_success = $db->updateUser($id, $new_username, $role, $activate);
    }

}

?>
    <form class="myForm" action="admin.php?user_id=<?php echo $id ?>" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>
        Username : <input class="input" type="text" name="username"
                          value="<?php echo $user->username ?>"><br>
        Role :
        <select name="role">
            <option value="<?php echo Role::Collaborator ?>" <?php if ($user->role == Role::Collaborator) echo "selected" ?>>
                Collaborator
            </option>
            ";
            <option value="<?php echo Role::Administrator ?>" <?php if ($user->role == Role::Administrator) echo "selected" ?>>
                Administrator
            </option>
            ";
        </select><br>
        Activate: <input type="checkbox" name="activate"
                         value="1"<?php if ($user->activate == 1) echo "checked" ?>><br>
        <div class="container-login100-form-btn m-b-20">
            <button type="submit" class="login100-form-btn m-t-20">Apply</button>
        </div>
    </form>
    <div class="container-login100-form-btn m-b-20">
        <a href="admin.php?delete&user_id=<?php echo $user->id ?>" class="login100-form-btn m-t-20">Delete User</a>
    </div>
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
?>