<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(0) ?>

<!-- MAIN CONTENT -->

  <div class="main-content">

    <?php $entries = getEntries($db); ?>
    <h1 class="last-entries">Entries</h1>

    <?php while($entry = mysqli_fetch_assoc($entries)): ?>
    
      <article class="entry">
        <a href="entry.php?id=<?= $entry['id'] ?>" class="entry-link">
          <div class="data">
            <h2 class="entry-title"><?= $entry['titulo'] ?></h2>
            <p class="entry-info">Created by <?= $entry['nombre'] . ' ' . $entry['apellidos'] ?> | <?= $entry['fecha'] ?> | Category: <?= $entry['category_nombre'] ?>.</p>
          </div>
          <p class="description">
            <?= substr($entry['descripcion'], 0, 100) . '...' ?>
          </p>
        </a>
      </article>

    <?php endwhile; ?>
    
    <a href="index.php" class="allEntries">Return</a>
  </div>

  <?php require_once './includes/footer.php' ?>
