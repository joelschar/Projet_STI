<?php
/**
 * CrepMessaging
 * Authors : Yann Lederrey and Joel Schar
 *
 * Possible Users Role
 */

abstract class Role {
    const Administrator = 1;
    const Collaborator = 2;

    static public function getById($id){
        switch($id){
            case 1:
                return Role::Administrator;
            case 2:
                return Role::Collaborator;
            default:
                return 0;
        }

    }

    static public function getString($id){
        switch($id){
            case 1:
                return "Administrator";
            case 2:
                return "Collaborator";
            default:
                return "Error";
        }
    }
}
