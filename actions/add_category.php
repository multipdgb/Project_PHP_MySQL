<?php
require_once '../includes/conection.php';

if(!isset($_SESSION)){
session_start();
}

$page_id = 0;
$pages = ['index', 'entry'];

if(!isset($_SESSION['page_index'])){

    $page_id = $_SESSION['page_index'];
    
}

if (isset($_POST)) {
    $name = isset($_POST['name']) ? $_POST['name'] : false;

    $error = array();

    if (empty($name)) {
        $error['name'] = 'Name field is empty';
    }


    if (count($error) == 0) {
        $save_user = true;

        $sql = "INSERT INTO categorias VALUES(NULL, '$name');";

        $query = mysqli_query($db, $sql);
        
    }
    else {
        $_SESSION['create_error'] = $error;
        var_dump($_SESSION);
        die();
    }

}

header('Location: ../index.php');