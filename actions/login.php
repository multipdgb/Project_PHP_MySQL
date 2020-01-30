<?php
require '../includes/conection.php';

if (!isset($_SESSION)) {
  session_start();
}

$page_id = 0;
$pages = ['index', 'entry'];

if(!isset($_SESSION['page_index'])){

    $page_id = $_SESSION['page_index'];
    
}

$error = array();

// Recoger datos de POST

if (isset($_POST)) {
  $email = isset($_POST['email']) ? $_POST['email'] : false;
  $password = isset($_POST['password']) ? $_POST['password'] : false;

  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_validate = true;
  }
  else {
    $email_validate = false;

    if (empty($email)) {
      $error['email'] = 'Email field is empty';
    }
    else{
      $error['email'] = 'Email field is invalid';
    }
  }


  $sql = "SELECT * FROM Usuarios WHERE Usuarios.email = '$email' LIMIT 1";
  $login = mysqli_query($db, $sql);

  if($login && mysqli_num_rows($login) == 1){

    $user = mysqli_fetch_assoc($login);


    if (password_verify($password, $user['password'])) {

      $_SESSION['user'] = $user;
    }
    else {
      $error['password_incorrect'] = 'The password is incorrect';
    }

  }
  else{
    $error['data_error'] = 'Login has falied: ' . mysqli_error($db) . '. Try it again';
  }
}

// var_dump($error);
// die();

if (!empty($error)) {
  $_SESSION['login_error'] = $error;
}


header('Location: ../' . $pages[$page_id] . '.php');
 ?>
