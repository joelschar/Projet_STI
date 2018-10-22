<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Logout page, redirects to the login.
 */

session_start();
if(session_destroy()) {
    header("Location: /index.php");
}