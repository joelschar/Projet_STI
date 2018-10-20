<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/1/18
 * Time: 2:35 PM
 */
//source : https://github.com/BestsoftCorporation/PHP-SQLITE-registration-login-form/blob/master/login.php
session_start();
if (isset($_POST["username"])){

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password missing";
    }
    else {

        include ('db.php');

        $db = new DB();
        if(!$db){
            echo $db->lastErrorMsg();
        }

        $sql ='SELECT * FROM t_user WHERE username="'.$_POST["username"].'";';
        $ret = $db->query($sql);
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $id=$row['id'];
            $username=$row["username"];
            $password=$row['password'];
            $activate = $row['activate'];
        }
        if ($id!=""){

            if ($activate == 1){
                $pwd = $_POST["password"];

                if ($password==$_POST["password"]){
                    echo 'password OK';
                    $_SESSION["login"]=$username;
                    $_SESSION["login_id"]=$id;
                    header('Location: ../mail.php');
                }else{

                    $error = "Wrong Password";
                }
            } else {
                $error = "Account innactif";
            }
        }else{
            $error = "User not exists, please register to continue!";
        }
        //echo "Operation done successfully\n";
        $db->close();
    }
}
?>