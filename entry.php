<?php require_once './includes/header.php' ?>
<?php require_once './includes/sidebar.php' ?>
<?php require_once './actions/helpers.php' ?>
<?php require_once './includes/page_index.php'; setSessionPageIndex(1) ?>

<div class="main-content entry-main-content">
    <?php $entries = getEntries($db, 1, $_GET['id']); ?>

    <?php while($entry = mysqli_fetch_assoc($entries)): ?>

        <article class="entire-entry">

            <div class="data">
                <h2 class="entry-title"><?= $entry['titulo'] ?></h2>
                <p class="entry-info">Created by <?= $entry['nombre'] . ' ' . $entry['apellidos'] ?> | <?= $entry['fecha'] ?> | Category: <?= $entry['category_nombre'] ?>.</p>
            </div>
            <p class="description">
                <?= $entry['descripcion'] ?><?= $entry['descripcion']{strlen($entry['descripcion']) - 1} != '.' ? '.' : '' ?>
            </p>

            <?php if(isTheAutorOfTheEntry($entry['usuario_id'])): ?>
                <br>
                <div class="buttons-section">
                    <a href="edit_entry.php?id=<?= $entry['id'] ?>"><img src="https://cdn2.iconfinder.com/data/icons/freecns-cumulus/16/519584-081_Pen-512.png" alt="edit"></a>

                    <a href="actions/delete_entry.php?id=<?= $entry['id'] ?>"><img src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_delete_48px-512.png" alt="delete"></a>
                </div>

            <?php endif; ?>
            
        </article>

    <?php endwhile; ?>

</div>

<?php require_once './includes/footer.php' ?>