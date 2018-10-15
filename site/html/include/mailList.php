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
$sql="SELECT subject, id, source, destination, message FROM t_message WHERE destination='$user_check'";
$ret= $db->query($sql);
?>
<ul id="nav">
    <?php
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $subject =$row['subject'];
            $source =$row['source'];
            ?><li><a href="?id=<?php echo$row['id'] ?>"><?php echo $subject ?> - <?php echo $source?></a></li><?php
        }
?>
</ul>