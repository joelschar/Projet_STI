<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * User class
 */

class User {
    public $id;
    public $username;
    public $role;
    public $activate;

    public function __construct($id, $username, $role, $activate) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->activate = $activate;
    }

    public function isRole($role){
        return $this->role == $role;
    }

    function isActivate(){
        return $this->activate;
    }
}