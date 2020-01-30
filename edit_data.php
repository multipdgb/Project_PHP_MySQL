<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './actions/redirection.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(0)?>

<!-- MAIN CONTENT -->

  <div class="main-content">

    <form action="./actions/edit_data.php" method="post" class="block-aside">

        <h3>Edit user data</h3>
        
        <?= 
            isset($_SESSION['edit_error']) ? showErrors($_SESSION['edit_error'], 'name') : ''
        ?>

        <label for="name">Name</label>
        <input type="text" name="name" class="field" value="<?= $_SESSION['user']['nombre'] ?>">

        <?= 
            isset($_SESSION['edit_error']) ? showErrors($_SESSION['edit_error'], 'surname') : ''
        ?>

        <label for="surname">Surname</label>
        <input type="text" name="surname" class="field" value="<?= $_SESSION['user']['apellidos'] ?>">

        <input type="submit" value="Confirm" class="submit">

    </form>

  </div>
  <?php destroySession('create_error'); ?>

<?php require_once './includes/footer.php' ?>
