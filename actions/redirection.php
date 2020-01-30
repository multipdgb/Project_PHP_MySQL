<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['user'])){

    $_SESSION['user_error']['user_not_registered_error'] = 'Register or login first, please';
    header('Location: ../index.php');

}

?>