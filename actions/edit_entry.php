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

    $id = isset($_POST['id']) ? $_POST['id'] : false;

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

        $sql = "UPDATE entradas SET titulo = '$title', descripcion = '$description', categoria_id = $category_id WHERE id = $id;";

        $query = mysqli_query($db, $sql);
        
    }
    else {
        $_SESSION['create_error'] = $error;
    }

}

header('Location: ../index.php');
?>
