<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './actions/helpers.php' ?>
<?php require_once './actions/redirection.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(0)?>

<!-- MAIN CONTENT -->

  <div class="main-content">

    <form action="./actions/edit_entry.php" method="post" class="block-aside">

        <?php 
        
        $entry = mysqli_fetch_assoc(getEntries($db, 1, $_GET['id']));
        
        ?>

        <h3>Edit Entry</h3>
        
        <?= 
            isset($_SESSION['create_error']['name']) ? showErrors($_SESSION['create_error'], 'name') : ''
        ?>

        <label for="title">Title</label>
        <input type="text" name="title" class="field" value="<?= $entry['titulo'] ?>">


        <?= 
            isset($_SESSION['create_error']['description']) ? showErrors($_SESSION['create_error'], 'description') : ''
        ?>

        <label for="description">Description</label>
        <textarea name="description" class="field"><?= $entry['descripcion'] ?></textarea>


        <?= 
            isset($_SESSION['create_error']['category']) ? showErrors($_SESSION['create_error'], 'category') : ''
        ?>

        <label for="category">Category</label>
        <select name="category">

            <?php $categories = getCategories($db) ?>
            <?php while($category = mysqli_fetch_assoc($categories)): ?>

                <option value="<?= $category['id'] ?>" <?= ($category['id'] == $entry['categoria_id']) ? 'selected' : '' ?>><?= $category['nombre'] ?></option>

            <?php endwhile; ?>

        </select>

        <input type="hidden" name="id" value="<?= $entry['id'] ?>">

        <input type="submit" value="Create" class="submit">

    </form>

  </div>
  <?php destroySession('create_error'); ?>

<?php require_once './includes/footer.php' ?>