<?php
$username = $_SESSION['login'];
$sql="SELECT role FROM t_user WHERE username='$username'";
$ret= $db->query($sql);

while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $role =$row['role'];
}
?>

<nav class="navbar" id="sidebar-wrapper" role="navigation">
    <ul class="mailnavBar">
        <li class="sidebar-brand">
            <a href="mail.php?sendMail">
                Send Email
            </a>
        </li>
        <li>
            <a href="mail.php?viewMail">
                view Email
            </a>
        </li>
        <li>
            <a href="profile.php">
                profile
            </a>
        </li>
        <?php
        if($role == "administrator"){
        ?>
        <li>
            <a href="admin.php">
                Administration
            </a>
        </li>
        <?php }?>
        <li>
            <a href="/include/logout.php">
                logout
            </a>
        </li>
    </ul>
</nav>