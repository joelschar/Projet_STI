<?php

$date = date("d/m/Y-h:i:s");
echo $date;

/**
 * Created by PhpStorm.
 * User: zutt
 * Date: 10/15/18
 * Time: 2:34 PM
 */

include_once ('db.php');
$db = new DB();
if(!$db){
    echo $db->lastErrorMsg();
}
$user_check=$_SESSION['login'];
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="SELECT t_message.id AS id, t_message.source AS src_id, t_user_src.username AS src_name , t_message.destination AS dst_id, t_user_dst.username AS dst_name, t_message.subject AS subject, t_message.message AS message
      FROM t_message 
      INNER JOIN t_user t_user_src ON t_message.source = t_user_src.id 
      INNER JOIN t_user t_user_dst ON t_message.destination = t_user_dst.id 
      WHERE t_message.id='$id'";
    $ret= $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    ?>
        <div class="MailFrom">
            <p> From : <?php echo $row['src_name'] ?></p>
        </div>
        <div class="MailTo">
            <p> To : <?php echo $row['dst_name'] ?></p>
        </div>
        <div class="MailSubject">
            <p> Subject : <?php echo $row['subject'] ?></p>
        </div>

        <div class="MailMessage">
            <p> Message : </p>
            <p><?php echo $row['message'] ?></p>
        </div>
    <?php
        }
}
?>
