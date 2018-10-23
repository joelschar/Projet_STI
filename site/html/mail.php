<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Mail page, see and send Creps. The different pages are changed depending on the query string.
 */

include_once('includes/a_config.php');
include("includes/session.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("includes/head-tag-contents.php"); ?>
</head>
<body>

<div class="mainContainer container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="LeftContainer ">
        <?php include('includes/navbar.php') ?>
    </div>
    <div class="RightContainer ">
        <div class="leftWrap">
            <div class="container-login100-form-btn m-b-20">
                <a href="/mail.php?sendMail" class="login100-form-btn new-collaborator-btn">
                    New Crepe
                </a>
            </div>
            <div class="mailList">
                <div class="mailListContent">
                    <?php include('includes/mailList.php') ?>
                </div>
            </div>
        </div>
        <div class="view">
            <div class="viewContent">
                <?php
                // using query string to change content view of the mail page.
                if (isset($_GET['viewMail'])) {
                    include('includes/viewMail.php');
                } else if (isset($_GET['sendMail'])) {
                    include('includes/newMail.php');
                }

                ?>
            </div>
        </div>
    </div>
</div>


<?php include_once('includes/footer.php'); ?>
<script src="js/main.js"></script>

</body>
</html>