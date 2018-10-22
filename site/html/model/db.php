<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Possible Users Role
 */

include_once('user.php');
include_once('role.php');
include_once('model/mail.php');

class DB extends SQLite3
{
    function __construct()
    {
        $this->open('/usr/share/nginx/databases/crepmsg.db');
    }

    function getUser($username){
        $sql="SELECT * FROM t_user WHERE username='$username'";
        $ret= $this->query($sql);

        $user = null;

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $user = new User($row['id'], $row['username'], $row['role'], $row['activate']);
        }
        return $user;
    }

    function getUserById($id){
        $sql="SELECT * FROM t_user WHERE id='$id'";
        $ret= $this->query($sql);

        $user = null;

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $user = new User($row['id'], $row['username'], $row['role'], $row['activate']);
        }
        return $user;
    }

    function getUserName($id){
        $sql="SELECT username FROM t_user WHERE id='$id'";
        $ret= $this->query($sql);

        $username = "";

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $username = $row['username'];
        }
        return $username;
    }

    function getAllUser(){
        $sql="SELECT * FROM t_user";
        $ret= $this->query($sql);

        $user_list = array();

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $user = new User($row['id'], $row['username'], $row['role'], $row['activate']);
            array_push($user_list, $user);
        }
        return $user_list;
    }

    function updateUser($id, $username, $role, $activate){
        $qry = "UPDATE t_user SET username='$username', role='$role', activate='$activate' WHERE id='$id'";
        $ret = $this->exec($qry);

        if (!$ret) {
            echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }

    function usernameExists($username){
        $sql="SELECT id FROM t_user WHERE username='$username'";
        $ret= $this->query($sql);

        $id = "";

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $id = $row['id'];
        }
        return ! $id == "";
    }


    function deleteUserById($id){
        $sql="DELETE FROM t_user WHERE id='$id'";

        $ret = $this->exec($sql);
        if(!$ret) {
            echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }


    function insertUser($username, $password, $role = Role::Collaborator, $activate = 1){
        $qry = "INSERT INTO t_user(username, password, role, activate) VALUES ('$username', '$password', '$role', $activate)";
        $ret = $this->exec($qry);

        if (!$ret) {
            echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }

    function validePassword($username, $password){
        $sql="SELECT password FROM t_user WHERE username='$username'";
        $ret= $this->query($sql);

        $isValide = 0;

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $isValide = $password == $row['password'];
        }
        return $isValide;
    }

    function getPassword($username){
        $sql="SELECT password FROM t_user WHERE username='$username'";
        $ret= $this->query($sql);

        $password = "";

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $password = $row['password'];
        }
        return $password;
    }

    function updatePassword($username, $new_password){
        $sql="UPDATE t_user SET password='$new_password' WHERE username='$username'";

        $success = true;

        $ret = $this->exec($sql);
        if(!$ret) {
            echo $this->lastErrorMsg();
            $success = false;
        }
        return $success;
    }

    function getAllMessages($user_id){
        $sql="SELECT t_message.id AS id, t_message.source AS src_id, t_user_src.username AS src_name , t_message.destination AS dst_id, t_user_dst.username AS dst_name, t_message.subject AS subject, t_message.date_time AS date_time, t_message.message AS message
              FROM t_message 
              INNER JOIN t_user t_user_src ON t_message.source = t_user_src.id 
              INNER JOIN t_user t_user_dst ON t_message.destination = t_user_dst.id
              WHERE destination ='$user_id'";
        $ret= $this->query($sql);

        $message_list = array();

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $message = new Mail($row['id'], $row['src_id'], $row['src_name'], $row['dst_id'], $row['dst_name'], $row['subject'], $row['date_time'], $row['message']);
            array_push($message_list, $message);
        }

        return $message_list;
    }

    function getMessageById($id){
        $sql="SELECT t_message.id AS id, t_message.source AS src_id, t_user_src.username AS src_name , t_message.destination AS dst_id, t_user_dst.username AS dst_name, t_message.subject AS subject, t_message.date_time AS date_time, t_message.message AS message
              FROM t_message 
              INNER JOIN t_user t_user_src ON t_message.source = t_user_src.id 
              INNER JOIN t_user t_user_dst ON t_message.destination = t_user_dst.id
              WHERE t_message.id ='$id'";
        $ret= $this->query($sql);

        $message = null;

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $message = new Mail($row['id'], $row['src_id'], $row['src_name'], $row['dst_id'], $row['dst_name'], $row['subject'], $row['date_time'], $row['message']);
        }

        return $message;
    }

    function insertMessage ($source_id, $destination_id, $subject, $message, $date_time){
        $sql = "INSERT INTO t_message(source, destination, message, subject, date_time) VALUES ('$source_id','$destination_id','$message','$subject','$date_time')";

        $ret = $this->exec($sql);
        if (!$ret) {
            echo $this->lastErrorMsg();
        }
    }

    function deleteMessageById ($id){
        $sql="DELETE FROM t_message WHERE id='$id'";

        $ret = $this->exec($sql);
        if(!$ret) {
            echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }

}