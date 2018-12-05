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
          <h1 class="is-size-3">Change password below</h1>
          <h3 class="is-size-4">{USERS EMAIL}</h3>
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
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>
            <div class="field">
              <label class="label">Re-enter Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>
            <input class="button is-primary pass_button" type="submit" title="Login">
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
