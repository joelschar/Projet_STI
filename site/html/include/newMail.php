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

if(isset($_POST['destination_id'])){

  $destination = $_POST['destination_id'];
  $source = $_SESSION['login_id'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $date = date("d/m/Y-h/i/s");

  echo $date;

  $qry="INSERT INTO t_message(source, destination, message, subject, datetime) VALUES (".$source.",".$destination.",".$message.",".$subject.",".$date.")";

  $ret = $db->exec($qry);
  if(!$ret) {
      echo $db->lastErrorMsg();
  }

  //header("Location: /mail.php?viewMail");

}

?>

<form action="/mail.php?sendMail" method="post">
  Send to :
  <select name="destination_id">
      <?php
      $sql="SELECT id, username FROM t_user";
      $ret= $db->query($sql);
      while ($row = $ret->fetchArray(SQLITE3_ASSOC) ){
          echo "<option value=\"".$row['id']."\">" . $row['username'] . "</option>";
      }
      ?>
  </select>
  <br>
  Subject : <input class="input" type="text" name="subject" value=""><br><br>

  <textarea class="input" name="message" rows="10" cols="30">
  </textarea><br><br>
  <input type="submit" value="Submit">
</form>