<?php
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
    $sql="SELECT subject, id, source, destination, message FROM t_message WHERE id='$id'";
    $ret= $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    ?>
        <div class="MailSubject">
            <p> Subject : <?php echo $row['subject'] ?></p>
        </div>
        <div class="MailFrom">
            <p> From : <?php echo $row['source'] ?></p>
        </div>
        <div class="MailFor">
            <p> For : <?php echo $row['destination'] ?></p>
        </div>
        <div class="MailMessage">
            <h2> Message : </h2>
            <p><?php echo $row['message'] ?></p>
        </div>
    <?php
        }
}
?>
