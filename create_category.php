<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './actions/redirection.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(0)?>

<!-- MAIN CONTENT -->

  <div class="main-content">

    <form action="./actions/add_category.php" method="post" class="block-aside">

        <h3>Create Category</h3>
        
        <?= 
            isset($_SESSION['create_error']) ? showErrors($_SESSION['create_error'], 'name') : ''
        ?>

        <label for="name">Name</label>
        <input type="text" name="name" class="field">

        <input type="submit" value="Create" class="submit">

    </form>

  </div>
  <?php destroySession('create_error'); ?>

<?php require_once './includes/footer.php' ?>
