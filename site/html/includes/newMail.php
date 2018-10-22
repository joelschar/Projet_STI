<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * sending message form
 */


$current_username = $_SESSION['login'];

if (!empty($_POST)){
    if (isset($_POST['destination_id'])) {

        $source_id = $_SESSION['login_id'];
        $destination_id = $_POST['destination_id'];
        $subject = $_POST['subject'];
        $date_time = time();
        $message = $_POST['message'];

        $db->insertMessage($source_id, $destination_id, $subject, $date_time, $message);

        header("Location: /mail.php?viewMail");
    }
    else{
        $dst_error = "Destination is required";
    }
    echo $dst_error;
}

?>

<form action="/mail.php?sendMail" method="post">
    Send to :
    <select name="destination_id">
        <?php
        $user_list = $db->getAllUser();

        foreach($user_list as $user){
            if($user->username == $current_username){
                continue;
            }
            echo "<option value=\"".$user->id."\">".$user->username."</option>";
        }
        ?>
    </select>
    <br>
    Subject : <input class="input" type="text" name="subject" value="<?php echo $_POST['subject']?>"><br><br>

    <textarea class="input" name="message" rows="10" cols="30">
        <?php echo $_POST['message']?>
  </textarea><br><br>
    <input type="submit" value="Submit">
</form>