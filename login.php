<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
  </head>
  <body>
    <?php
      $home = 0;
      include 'header.php';
    ?>
    <hr>
      <section class="center form">
        <div class="has-text-centered">
          <h1 class="is-size-3">Welcome to Task Manager <i class="fa fa-tasks" aria-hidden="true" id="taskIcon"> </i></h1>
          <h3 class="is-size-4">Please login below</h3>
          <br> <br> <br>
        </div>
        <div class="form_holder_login">
          <p>
            <?php
              if(isset($error)) {
                echo $error;
              }
            ?>

          </p>
          <form action="login_submit.php" method="post">
            <div class="field">
              <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email" name="email">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>
            <a class="button is-link is-inverted" href="./forgot_password.php">Forgot Password</a>
            <input class="button is-primary login_button" type="submit" title="Login">
            </div>
          </form>
          <br> <br> <br>
        </div>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
