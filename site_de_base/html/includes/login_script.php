<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Script de login, validation de l'username password
 */
//source : https://github.com/BestsoftCorporation/PHP-SQLITE-registration-login-form/blob/master/login.php

session_start();

if (isset($_POST['username'])){
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password missing";
    }
    else {

        $user = $db->getUser($_POST['username']);

        if ($user != null){

            if ($user->isActivate()){
                $pwd = $_POST['password'];

                if ($db->validePassword($_POST['username'], $_POST['password'])){
                    $_SESSION['login']=$_POST['username'];
                    $_SESSION['user']=$user;
                    header('Location: /mail.php');
                }else{
                    $error = "Wrong Password";
                }
            } else {
                $error = "Account inactive";
            }
        }else{
            $error = "User not exists, please register to continue!";
        }
    }
}
