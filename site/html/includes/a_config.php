<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 *
 */

/** Create DB instance for the page. */
include('model/db.php');
$db = new DB();
if (!$db) {
    echo $db->lastErrorMsg();
}

switch ($_SERVER["SCRIPT_NAME"]) {
    case "/mail.php":
        $CURRENT_PAGE = "Mail";
        $PAGE_TITLE = "CrepMessage";
        break;
    case "/profile.php":
        $CURRENT_PAGE = "Profile";
        $PAGE_TITLE = "Profile";
        break;
    case "/admin.php":
        $CURRENT_PAGE = "Admin";
        $PAGE_TITLE = "Administation";
        break;
    case "/logout.php":
        $CURRENT_PAGE = "Logout";
        $PAGE_TITLE = "Logout";
        break;
    case "/login.php":
        $CURRENT_PAGE = "Login";
        $PAGE_TITLE = "Login Page";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to CrepMessaging !";
}
?>
