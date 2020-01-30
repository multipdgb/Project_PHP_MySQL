<?php

$server = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($server, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
  session_start();
}

 ?>
