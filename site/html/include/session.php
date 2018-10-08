<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/8/18
 * Time: 3:15 PM
 */

include ('db.php');
$db = new DB();
if(!$db){
    echo $db->lastErrorMsg();
}
session_start();
$user_check=$_SESSION['login'];
$sql="SELECT username FROM t_user WHERE username='$user_check'";
$ret= $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $login_session =$row['username'];
}
if(!isset($login_session)){
    $db->close(); // Closing Connection
    header('Location: ../index.php'); // Redirecting To Home Page
}
?>