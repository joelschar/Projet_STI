<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/1/18
 * Time: 2:35 PM
 */

class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../../databases/crepmsg.db');
    }
}
$db = new MyDB();

?>