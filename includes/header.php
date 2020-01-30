<?php require_once 'conection.php' ?>
<?php require_once './actions/helpers.php' ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog de Videojuegos</title>

  <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
  <!-- HEADER -->
  <header class="header">

    <div class="logotype">
      <a href="index.php">
        Blog de Videojuegos
      </a>

      <form action="search.php" class="search" method="get">
        <input type="search" name="search" class="field">

        <input type="submit" value="Search" class="submit">
      </form>
    </div>

    <!-- MENU -->
      <?php $categories = getCategories($db); ?>

      <nav class="nav">
          <ul>
            <li class="item"><a href="index.php">Home</a></li>
            
            <?php while($category = mysqli_fetch_assoc($categories)): ?>

            <li class="item"><a href="category.php?id=<?= $category['id'] ?>"><?= $category['nombre'] ?></a></li>

            <?php endwhile; ?>

            <li class="item"><a href="index.php">About</a></li>
            <li class="item"><a href="index.php">Contact</a></li>
          </ul>
      </nav>


  </header>
    <div class="container">
