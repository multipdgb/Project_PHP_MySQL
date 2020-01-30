<?php require_once '.\actions\helpers.php'; 
        
?>


<!-- SIDEBAR -->

<aside class="sidebar">

  <?php if(isset($_SESSION['user'])): ?>

          <div class="block-aside">
            <h1 class="welcome-button">Bienvenido/a, <?= $_SESSION['user']['nombre'] . '.' ?></h1>

            <div class="login-button-container">
                <a href="edit_data.php" class="login-button edit-user-data">Edit data</a>
                <a href="create_entry.php" class="login-button create-entry">Create Entry</a>
                <a href="create_category.php" class="login-button create-category">Create category</a>
                <a href="./actions/logout.php" class="login-button logout">Logout</a>
            </div>
          </div>

  <?php endif; ?>

  <?php if(!isset($_SESSION['user'])): ?>
        <div class="block-aside login">
                <h3>Login</h3>

                <?= isset($_SESSION['user_error']['user_not_registered_error']) ? '<br>' . showErrors($_SESSION['user_error'], 'user_not_registered_error') : '' ?>

                <form class="login" action="actions/login.php" method="post">

                <?= isset($_SESSION['login_error']['data_error']) ? showErrors($_SESSION['login_error'], 'data_error') : '' ?>

                <label for="email">Email</label>
                <input type="text" name="email" class="field">

                <?php if (isset($_SESSION['login_error'])): ?>

                        <?= isset($_SESSION['login_error']['email']) ? showErrors($_SESSION['login_error'], 'email') : '' ?>

                <?php endif; ?>


                <label for="password">Password</label>
                <input type="password" name="password" class="field">

                <?php if (isset($_SESSION['login_error'])): ?>

                        <?= isset($_SESSION['login_error']['password_incorrect']) ? showErrors($_SESSION['login_error'], 'password_incorrect') : '' ?>

                <?php endif; ?>


                <input type="submit" value="Enter" class="submit">

                </form>
        </div>



        <div class="block-aside register">
                <h3>Register</h3>
                <form class="register" action="actions/register.php" method="post">



                <?php if(isset($_SESSION['register_done'])): ?>

                        <div class="alert">
                                <p><?= $_SESSION['register_done'] ?></p>
                        </div>

                <?php elseif(isset($_SESSION['register_error'])): ?>


                        <?= isset($_SESSION['register_error']) ? showErrors($_SESSION['register_error'], 'insert_user') : '';?>


                <?php endif; ?>


                <label for="name">Name</label>
                <input type="text" name="name" class="field">

                <?php if(isset($_SESSION['register_error'])): ?>

                        <?= isset($_SESSION['register_error']) ? showErrors($_SESSION['register_error'], 'name') : '';?>

                <?php endif; ?>


                <label for="surname">Surname</label>
                <input type="text" name="surname" class="field">

                <?php if(isset($_SESSION['register_error'])): ?>

                        <?= isset($_SESSION['register_error']) ? showErrors($_SESSION['register_error'], 'surname') : ''; ?>

                <?php endif; ?>


                <label for="email">Email</label>
                <input type="text" name="email" class="field">

                <?php if(isset($_SESSION['register_error'])): ?>

                        <?= isset($_SESSION['register_error']) ? showErrors($_SESSION['register_error'], 'email') : ''; ?>

                <?php endif; ?>


                <label for="password">Password</label>
                <input type="password" name="password" class="field">

                <?php if(isset($_SESSION['register_error'])): ?>

                        <?= isset($_SESSION['register_error']) ? showErrors($_SESSION['register_error'], 'password') : ''; ?>

                <?php endif; ?>


                <input type="submit" value="Enter" class="submit">
                </form>
        </div>
  <?php endif; ?>

        <?php destroySession('register_error'); ?>
        <?php destroySession('login_error'); ?>
        <?php destroySession('register_done'); ?>
        <?php destroySession('user_error'); ?>
        <?php destroySession('create_error'); ?>
        <?php destroySession('edit_error'); ?>
</aside>
