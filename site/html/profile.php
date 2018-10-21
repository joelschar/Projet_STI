<?php
include("include/session.php");

if(isset($_POST['password'])){
    $username = $_SESSION['login'];
    $password = $_POST['password'];
    $qry="UPDATE t_user SET password='$password' WHERE username='$username'";

    $change_success = true;

    $ret = $db->exec($qry);
    if(!$ret) {
        echo $db->lastErrorMsg();
        $change_success = false;
    }
}

$sql="SELECT * FROM t_user WHERE username=\"".$_SESSION['login']."\"";
$ret= $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $username =$row['username'];
    $role = $row['role'];
    $password = $row['password'];
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
        <div class="view">
            <div class="viewContent">
                <div>
                    <p> Username :  <?php echo $username ?></p>
                </div>
                <div>
                    <p> Role :  <?php echo $role ?></p>
                </div>

                <!-- Print input field for password and submit button if change password is clicked -->
                <?php if(isset($_GET['ChangePassword'])){ ?>
                    <form action="profile.php" method="post">
                        Password : <input class="input100" type="text" name="password" value="<?php echo $password ?>"><br>
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