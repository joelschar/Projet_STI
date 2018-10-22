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

        // sort array descending
        usort($message_list, function($first,$second){
            return $first->date_time < $second->date_time;
        });

        foreach ($message_list as $message) {
            ?>
            <li><a href="?viewMail&id=<?php echo $message->id ?>"><?php echo $message->subject ?>
                - <?php echo $message->source_name ?><br>
                <?php echo date('Y-m-d H:i:s', $message->date_time) ?></a><br>
            -----------------
            </li><?php
        }
    }
    ?>
</ul>
