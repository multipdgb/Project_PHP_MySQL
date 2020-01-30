<?php

require_once './includes/conection.php';

function showErrors($errors, $field){
  $output = '';

  if(!empty($errors[$field])){
    $output = "<div class=" . '"alert error-alert"' . "><b>$errors[$field]</b></div>";
  }

  // var_dump($output);
  // die();

  return $output;
}

function destroySession($session_name){
  if (!isset($_SESSION)) {
    session_start();
  }

  $unset = false;

  if (isset($_SESSION[$session_name])) {
    unset($_SESSION[$session_name]);+

    $unset = true;
  }

  return $unset;
}

function getCategories($db, $quantity = NULL){
  $sql = 'SELECT * FROM categorias ORDER BY id ASC';

  if(!is_null($quantity)){
    $sql .= ' LIMIT ' . $quantity . ';';
  }
  else {
    $sql .= ';';
  }

  $result = array();

  $categorias = mysqli_query($db, $sql);
  
  if($categorias && mysqli_num_rows($categorias) > 0){
    $result = $categorias;
  }

  return $result;
}

function getEntries($db, $quantity = NULL, $id = NULL, $category = NULL, $search = NULL){
  $sql = 'SELECT entradas.*, usuarios.id AS usuario, usuarios.nombre, usuarios.apellidos, categorias.id AS category, categorias.nombre AS category_nombre FROM entradas
          INNER JOIN usuarios ON entradas.usuario_id = usuarios.id
          INNER JOIN categorias ON entradas.categoria_id = categorias.id
          ';
  
  if(!is_null($id) || !is_null($category) || !is_null($search)){
    $sql .= ' WHERE ';

    if (!is_null($id) && !is_null($category && !is_null($search))) {
      $sql .= 'entradas.id = ' . $id . 'AND entradas.categoria_id = ' . $category . 'AND entradas.titulo LIKE "%' . $search . '%"' . ' ORDER BY entradas.fecha DESC';
    }
    else if(is_null($category) && is_null($search)){
      $sql .= 'entradas.id = ' . $id . ' ORDER BY entradas.fecha DESC';
    }
    elseif(is_null($id) && !is_null($search) && !is_null($category)){
      $sql .= 'entradas.categoria_id = ' . $category . 'AND entradas.titulo LIKE "%' . $search . '%"' . ' ORDER BY entradas.fecha DESC';
    }
    elseif(!is_null($id) && !is_null($category)){
      $sql .= 'entradas.categoria_id = ' . $category . 'AND entradas.titulo LIKE "%' . $search . '%"' . ' ORDER BY entradas.fecha DESC';
    }
    elseif(!is_null($id) && !is_null($search) && is_null($category)){
      $sql .= 'entradas.id = ' . $id . 'AND entradas.titulo LIKE "%' . $search . '%"' . ' ORDER BY entradas.fecha DESC';
    }
    elseif(is_null($id) && is_null($category)){
      $sql .= 'entradas.titulo LIKE "%' . $search . '%"' . ' ORDER BY entradas.fecha DESC';
    }
    else{
      $sql .= 'entradas.categoria_id = ' . $category . ' ORDER BY entradas.fecha DESC';
    }

  }
  else{
    $sql .= ' ORDER BY entradas.fecha DESC';
  }

  if(!is_null($quantity)){
    $sql .= ' LIMIT ' . $quantity . ';';
  }
  else {
    $sql .= ';';
  }

  $result = array();

  $query = mysqli_query($db, $sql);
  if($query && mysqli_num_rows($query) > 0){
    $result = $query;
    return $result;
  }
  else if(mysqli_num_rows($query) <= 0 && !is_null($category)){
    $result = '<br>There is not any entries about this category :(';
    return $result;
  }
  else if(mysqli_num_rows($query) <= 0 && is_null($category)){
    $result = '<br>There is not any entries in the blog :(';
    
    return $result;
  }
}

function setSessionPageIndex($index){
  if (!isset($_SESSION)) {
    session_start();
  }
  $_SESSION['page_index'] = $index;
}

function isTheAutorOfTheEntry($entry){
  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SESSION['user']['id'] == $entry) {
    return true;
  }
  else{
    return false;
  }
}

 ?>