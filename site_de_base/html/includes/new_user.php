<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * change collaborator windwow content
 */

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($_POST['activate'] == 1) {
        $activate = 1;
    } else {
        $activate = 0;
    }

    // check if username is available
    if ($db->usernameExists($username)) {
        $error = "Username already exists.";
    }else{
        $db->insertUser($username, $password, $role, $activate);
        header("location: /admin.php");
    }
}

if (isset($error)){
    echo $error;
}
?>
<form class="myForm" action="/admin.php?new_user" method="post">
    Username : <input class="input" type="text" name="username"><br>
    Password : <input class="input" type="password" name="password"><br>
    Role :
    <select name="role">
        <option value="<?php echo Role::Collaborator ?>">
            Collaborator
        </option>
        ";
        <option value="<?php echo Role::Administrator ?>">
            Administrator
        </option>
        ";
    </select><br>
    Activate: <input type="checkbox" name="activate"
                     value="1" checked><br>
    <div class="container-login100-form-btn m-b-20">
        <button type="submit" class="login100-form-btn m-t-20">Apply</button>
    </div>
</form>
