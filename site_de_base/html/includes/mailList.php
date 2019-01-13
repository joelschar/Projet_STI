<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * list of received emails
 */

$user = $_SESSION['user'];

$message_list = $db->getAllMessages($user->id);

?>
<div class="mailNav">
    <ul>
        <?php

        if (empty($message_list)) { ?>

            <li>No message</li>

        <?php } else {

            // sort array descending
            usort($message_list, function($first,$second){
                return $first->date_time < $second->date_time;
            });

            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            foreach ($message_list as $message) {
                ?>
                <li><a href="?viewMail&id=<?php echo $message->id ?>" class="<?php if($id == $message->id) echo "active" ?>">
                    <?php echo $message->source_name ?>   |   <?php echo $message->subject ?><br>
                    <?php echo date('Y-m-d H:i:s', $message->date_time) ?></a>
                </li><?php
            }
        }
        ?>
    </ul>
</div>

