<?php
session_start();
session_regenerate_id(true);
require 'classes/database.php';
require 'classes/user.php';
require 'classes/friend3.php';
$db_obj = new Database();
$db_connection = $db_obj->dbConnection();
$user_obj = new User($db_connection);
$frnd_obj = new Friend3($db_connection);
?>