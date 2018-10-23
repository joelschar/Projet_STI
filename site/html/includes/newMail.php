<?php
/**
 * CrepeMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * form for sending new mails
 */

$current_user = $_SESSION['user'];

if (!empty($_POST)){
    $dst_error = "";
    if (isset($_POST['destination_id'])) {
        $source_id = $current_user->id;
        $destination_id = $_POST['destination_id'];
        $subject = $_POST['subject'];
        $date_time = time();
        $message = $_POST['message'];

        $db->insertMessage($source_id, $destination_id, $subject, $message, $date_time);

        header("Location: /mail.php");
    }
    else{
        $dst_error = "Destination is required";
    }
    echo $dst_error;
}


?>

<form class="myForm" action="/mail.php?sendMail" method="post">
    Send to :
    <select name="destination_id">
        <?php
        // if to is set, it's only possible to sent to the rechested user
        if(isset($_GET['to'])){
            $to = $_GET['to'];
            $user = $db->getUserById($to);
            echo "<option value=\"".$user->id."\" >".$user->username."</option>";
        }
        else{
            $user_list = $db->getAllUser();

            foreach($user_list as $user){
                if($user->username == $current_user->username){
                    continue;
                }
                echo "<option value=\"".$user->id."\" >".$user->username."</option>";
            }
        }
        ?>
    </select>
    <br>
        Subject : <input type="text" name="subject" value="<?php if(!empty($_POST)) echo $_POST['subject']?>"><br><br>

    <textarea class="input" name="message" rows="10" cols="30">
        <?php if(!empty($_POST)) echo $_POST['message']?>
  </textarea><br><br>
    <div class="container-login100-form-btn">
        <button type="submit" value="Submit" class="login100-form-btn new-collaborator-btn">Send</button>
    </div>
</form>