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
    $title = isset($_POST['title']) ? $_POST['title'] : false;
    $description = isset($_POST['description']) ? $_POST['description'] : false;
    $category_id = isset($_POST['category']) ? $_POST['category'] : false;
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

    $error = array();

    if (empty($title)) {
        $error['title'] = 'Title field is empty';
    }
    if (empty($description)) {
        $error['description'] = 'Description field is empty';
    }
    if (empty($category_id)) {
        $error['category'] = 'Category field is empty';
    }


    if (count($error) == 0) {
        $save_user = true;

        $sql = "INSERT INTO entradas VALUES(NULL, " . $_SESSION['user']['id'] . ", $category_id, '$title', '$description', NOW());";

        $query = mysqli_query($db, $sql);
        
    }
    else {
        $_SESSION['create_error'] = $error;
    }

}

header('Location: ../index.php');
?>
