<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Starting session and redirect user if not logged in to login
 */

session_start();

// check if the user is logged in by checking is login is set ( get set at login)
if(!isset($_SESSION['login'])){
    $db->close();
    header('Location: /index.php');
    }
?>