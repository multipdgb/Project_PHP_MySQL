<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './actions/redirection.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(0)?>

<!-- MAIN CONTENT -->

  <div class="main-content">

    <form action="./actions/add_entry.php" method="post" class="block-aside">

        <h3>Create Entry</h3>
        
        <?= 
            isset($_SESSION['create_error']['name']) ? showErrors($_SESSION['create_error'], 'name') : ''
        ?>

        <label for="title">Title</label>
        <input type="text" name="title" class="field">


        <?= 
            isset($_SESSION['create_error']['description']) ? showErrors($_SESSION['create_error'], 'description') : ''
        ?>

        <label for="description">Description</label>
        <textarea name="description" class="field"></textarea>


        <?= 
            isset($_SESSION['create_error']['category']) ? showErrors($_SESSION['create_error'], 'category') : ''
        ?>

        <label for="category">Category</label>
        <select name="category">

            <?php $categories = getCategories($db) ?>
            <?php while($category = mysqli_fetch_assoc($categories)): ?>

                <option value="<?= $category['id'] ?>"><?= $category['nombre'] ?></option>

            <?php endwhile; ?>

        </select>

        <input type="submit" value="Create" class="submit">

    </form>

  </div>
  <?php destroySession('create_error'); ?>

<?php require_once './includes/footer.php' ?>