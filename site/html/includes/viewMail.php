<?php

/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * view mail pages
 */

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if($db->deleteMessageById($id)){
        // message to confirme deletion
        header("location: /mail.php");
    }
}

$current_user = $_SESSION['user'];
$current_user_id = $current_user->id;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $message = $db->getMessageById($id);

    if ($message == null) {
        ?>
        <div class="alert-info100">
            <p>Message doesn't exists</p>
        </div>
    <?php }
    else if($message->destination_id != $current_user_id){
        ?>
        <div class="alert-info100">
            <p>Access restricted</p>
        </div>
    <?php }
    else { ?>
        <div class="MailFrom">
            <p> From : <?php echo $message->source_name ?></p>
        </div>
        <div class="MailTo">
            <p> To : <?php echo $message->destination_name ?></p>
        </div>
        <div class="Date">
            <p> Date : <?php echo date('d-m-Y H:i:s', $message->date_time) ?></p>
        </div>
        <div class="MailSubject">
            <p> Subject : <?php echo $message->subject ?></p>
        </div>
        <div class="MailMessage">
            <p> Message : </p>
            <p><?php echo $message->message ?></p>
        </div>


    <div class="container-login100-form-btn m-b-20" >
        <a href="/mail.php?viewMail&delete&id=<?php echo $id ?>" class="login100-form-btn m-t-20">Delete</a>
    </div>
    <div class="container-login100-form-btn m-b-20">
        <a href="/mail.php?sendMail&to=<?php echo $message->source_id ?>" class="login100-form-btn m-t-20">reply</a>
    </div>

    <?php } // end else
} // end if
?>
