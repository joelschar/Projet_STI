<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/1/18
 * Time: 2:35 PM
 */

try{
    $pdo = new PDO('sqlite:/usr/share/nginx/databases/crepmsg.db');
}catch (PDOException $e){
     die ('DB Error');
}
?>