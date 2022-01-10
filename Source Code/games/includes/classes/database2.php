<?php
$site_db = mysqli_connect("localhost","root","","frnd_req_system");
if(!$site_db){
    die("Connection failed: ".mysqli_connect_error());
}