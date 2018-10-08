<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 10/8/18
 * Time: 3:16 PM
 */

session_start();
if(session_destroy())
{
    header("Location: ../index.php");
}
?>