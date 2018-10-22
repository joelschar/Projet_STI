<?php

$date = date("d/m/Y-h:i:s");
echo $date;

/**
 * Created by PhpStorm.
 * User: zutt
 * Date: 10/15/18
 * Time: 2:34 PM
 */

include_once('db.php');
$db = new DB();
if (!$db) {
    echo $db->lastErrorMsg();
}
$user_check = $_SESSION['login'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $message = $db->getMessageById($id);

    if ($message == null) {
        ?>
        <div class="">
            <p>Message doesn't exists</p>
        </div>
    <?php } else { ?>
        <div class="MailFrom">
            <p> From : <?php echo $message->source_name ?></p>
        </div>
        <div class="MailTo">
            <p> To : <?php echo $message->destination_name ?></p>
        </div>
        <div class="MailSubject">
            <p> Subject : <?php echo $message->subject ?></p>
        </div>

        <div class="MailMessage">
            <p> Message : </p>
            <p><?php echo $message->message ?></p>
        </div>

    <?php } // end else
} // end if
?>
