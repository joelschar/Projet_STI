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
$user_id=$_SESSION['login_id'];

$sql="SELECT t_message.id AS id, t_message.source AS src_id, t_user_src.username AS src_name , t_message.destination AS dst_id, t_user_dst.username AS dst_name, t_message.subject AS subject, t_message.message AS message
      FROM t_message 
      INNER JOIN t_user t_user_src ON t_message.source = t_user_src.id 
      INNER JOIN t_user t_user_dst ON t_message.destination = t_user_dst.id
      WHERE destination ='$user_id'";
$ret= $db->query($sql);
?>
<ul id="nav">
    <?php
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $subject =$row['subject'];
            $source =$row['src_name'];
            $date = $row['date'];
            ?><li><a href="?viewMail&id=<?php echo$row['id'] ?>"><?php echo $subject ?> - <?php echo $source?></a><br>
            <?php echo $date ?><br>
            ----
            </li><?php
        }
?>
</ul>