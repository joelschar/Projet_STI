<?php
include("include/session.php");

$username=$_SESSION['login'];

$sql="SELECT role FROM t_user WHERE username='$username'";
$ret= $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $role =$row['role'];
}
if($role != "administrator"){
    header('Location: profile.php'); // Redirecting To Home Page
}

if(isset($_GET['delete'])){
    $id=$_GET['user_id'];
    $sql="DELETE FROM t_user WHERE id='$id'";
    $ret= $db->query($sql);
}

if(isset($_POST['username'])){
    $new_username=$_POST['username'];
    $role=$_POST['role'];
    if($_POST['activate'] == "1"){
        $activate = 1;
    }else{
        $activate = 0;
    }

    $qry="UPDATE t_user SET username='$new_username', role='$role', activate='$activate' WHERE username='$username'";
    $ret = $db->exec($qry);

    $change_success = true;
    if(!$ret) {
        echo $db->lastErrorMsg();
        $change_success = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V16</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/mail.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="mainContainer container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="LeftContainer ">
        <?php include('include/navbar.php') ?>
    </div>
    <div class="RightContainer ">
        <div class="mailList">
            <?php

        $sql="SELECT * FROM t_user";
        $ret= $db->query($sql);

        ?>
            <ul id="nav">
                <?php
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                    $id = $row['id'];
                    $username =$row['username'];

                    ?><li><a href="admin.php?user_id=<?php echo$row['id'] ?>"><?php echo $username ?></a>
                    </li><?php
                }
                ?>
        </div>

        <div class="view">
            <div class="viewContent">
                <?php
                if (isset($_GET['user_id'])) {
                    $id = $_GET['user_id'];

                    $sql="SELECT * FROM t_user WHERE id='$id'";
                    $ret= $db->query($sql);
                    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                        $username=$row['username'];
                        $role =$row['role'];
                        $activate = $row['activate'];
                    }

                    ?>
                <form action="admin.php?user_id=<?php echo $id ?>" method="post">
                    Username : <input class="input" type="text" name="username" value="<?php echo $username ?>"><br>
                    Role :
                    <select name="role">
                        <option value="collaborator" <?php if($role=="collaborator") echo selected ?>>Collaborator</option>";
                        <option value="administrator" <?php if($role=="administrator") echo selected ?>>Administrator</option>";
                    </select><br>
                    Activate: <input type="checkbox" name="activate" value="1"<?php if($activate == 1) echo "checked" ?>><br>
                    <button type="submit">Apply</button>
                </form>
                <a href="admin.php?delete&user_id=<?php echo $id ?>">Delete User</a>

                    <?php
                    if(isset($change_success)){
                        echo "<br>";
                        if($change_success){
                            echo "change successfull";
                        }else{
                            echo "change not applyed";
                        }
                    }
                } ?>

            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>