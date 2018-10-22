<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Mail Class
 */

class Mail {
    public $id;
    public $source_id;
    public $source_name;
    public $destination_id;
    public $destination_name;
    public $subject;
    public $date_time;
    public $message;

    function __construct($id, $source_id, $source_name, $destination_id, $destination_name, $subject, $date_time, $message){
        $this->id = $id;
        $this->source_id = $source_id;
        $this->source_name = $source_name;
        $this->destination_id = $destination_id;
        $this->destination_name = $destination_name;
        $this->subject = $subject;
        $this->date_time = $date_time;
        $this->message = $message;
    }
}

