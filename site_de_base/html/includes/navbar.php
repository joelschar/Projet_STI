<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * navigation bar inside logged in session.
 */

$user = $_SESSION['user'];
?>

<nav class="navbar" id="sidebar-wrapper" role="navigation">
    <ul class="mailnavBar">
        <li class="<?php if($CURRENT_PAGE == "Mail") echo "active"?>" >
            <a href="/mail.php">
                CrepeMessage
            </a>
        </li>
        <li class="<?php if($CURRENT_PAGE == "Profile") echo "active"?>" >
            <a href="/profile.php">
                Profile
            </a>
        </li>
        <?php
        if ($user->isRole(Role::Administrator)) {
            ?>
            <li class="<?php if($CURRENT_PAGE == "Admin") echo "active"?>">
                <a href="/admin.php">
                    Administration
                </a>
            </li>
        <?php } ?>
        <li class="<?php if($CURRENT_PAGE == "Logout") echo "active"?>" >
            <a href="/logout.php">
                Logout
            </a>
        </li>
    </ul>
</nav>