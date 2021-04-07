<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db_name = 'project';
$conn = mysqli_connect($host,$user,$pw,$db_name);
date_default_timezone_set('Asia/Bangkok');

if (!$conn) {
    die("Failed to connec to databse " . mysqli_error($conn));
}

?>