<?php require_once './redirection.php' ?>
<?php require_once '..\includes\conection.php' ?>

<!-- MAIN CONTENT -->

  <div class="main-content">
      

    <!-- <h3>Are you Sure?</h3>
    <h4>This action has not undo</h4>
    
    <a href="" class="sure"></a>
    <a href="" class="not-sure"></a> -->

    <?php
    
    $entry = isset($_GET['id']) ? $_GET['id'] : '';

    $sql = "DELETE FROM Entradas WHERE id = $entry;";
      
    mysqli_query($db, $sql);

    header('Location: ../index.php');

    ?>
        

  </div>
  <?php destroySession('create_error'); ?>

<?php require_once './includes/footer.php' ?>
