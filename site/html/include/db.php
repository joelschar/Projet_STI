<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/8/18
 * Time: 3:21 PM
 */

class DB extends SQLite3
{
    function __construct()
    {
        $this->open('/usr/share/nginx/databases/crepmsg.db');
    }
}
?>