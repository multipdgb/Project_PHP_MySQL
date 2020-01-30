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
    // name
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;

    // surname
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;

    // email
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    // password
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, trim($_POST['password'])) : false;


    $save_user = false;

    $error = array();

    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
      $name_validate = true;
    }
    else {
      $name_validate = false;

      if (empty($name)) {
        $error['name'] = 'Name field is empty';
      }
      else{
        $error['name'] = 'Name field is invalid';
      }
    }

    if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
      $surname_validate = true;
    }
    else {
      $surname_validate = false;

      if (empty($surname)) {
        $error['surname'] = 'Surname field is empty';
      }
      else{
        $error['surname'] = 'Surname field is invalid';
      }
    }

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

    if (!empty($password) && strlen($password) >= 8){
      $password_validate = true;
    }
    else {
      $password_validate = false;

      if (empty($password)) {
        $error['password'] = 'Password field is empty';
      }
      else{
        $error['password'] = 'Password field must have more than 8 characters';
      }
    }

  }

  if (count($error) == 0) {
    $save_user = true;
  }
  else {
    $_SESSION['register_error'] = $error;
  }

  // var_dump($_SESSION['register_error']);
  // die();

  if ($save_user) {
    // Encrypt Password
    $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 5]);


    // Save User in database
    $sql = "INSERT INTO Usuarios VALUES(NULL, '$name', '$surname', '$email', '$secure_password', CURDATE());";

    $query = mysqli_query($db, $sql);

    // Test if query worked succesfully
    if ($query) {
      $_SESSION['register_done'] = 'Registration completed succesfully';
    }
    else{
      $error['insert_user'] = 'Error while loading user';
      $_SESSION['register_error'] = $error;
    }
  }


  header('Location: ../' . $pages[$page_id] . '.php');

 ?>
