<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * navigation bar inside logged in session.
 */

$user = $_SESSION['user'];
?>

<nav class="navbar" id="sidebar-wrapper" role="navigation">
    <ul class="mailnavBar">
        <li>
            <a href="/mail.php">
                CrepMessage
            </a>
        </li>
        <li>
            <a href="/profile.php">
                Profile
            </a>
        </li>
        <?php
        if ($user->isRole(Role::Administrator)) {
            ?>
            <li>
                <a href="/admin.php">
                    Administration
                </a>
            </li>
        <?php } ?>
        <li>
            <a href="/logout.php">
                Logout
            </a>
        </li>
    </ul>
</nav>