<?php
require_once 'redirection.php';

if(isset($_SESSION)){
    session_start();
}

$page_index = 0;
$pages = ['index', 'entry'];

// if(!isset($_SESSION['page_index'])){

//     $page_id = $_SESSION['page_index'];

//     
    
// }

if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
}


header('Location: ../' . $pages[$page_index] . '.php');

?>