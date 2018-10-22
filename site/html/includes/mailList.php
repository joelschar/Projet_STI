<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * list of received emails
 */

$user = $_SESSION['user'];

$message_list = $db->getAllMessages($user->id);

?>
<ul id="nav">
    <?php

    if (empty($message_list)) { ?>

        <li>No message</li>

    <?php } else {

        foreach ($message_list as $message) {
            ?>
            <li><a href="?viewMail&id=<?php echo $message->id ?>"><?php echo $message->subject ?>
                - <?php echo $message->source_name ?><br>
                <?php echo $message->date_time ?></a><br>
            -----------------
            </li><?php
        }
    }
    ?>
</ul>
