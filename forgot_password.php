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
          <h1 class="is-size-3">Forgot Password</h1>
          <h3 class="is-size-4">Enter email to retrieve password</h3>
          <br> <br> <br>
        </div>
        <div class="form_holder_pass">
          <p>
            <?php
              if(isset($error)) {
                echo $error;
              }
            ?>

          </p>
          <form action="forgot_password_submit.php" method="post">
            <div class="field">
              <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email" name="email">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <input class="button is-primary pass_button" type="submit" title="Submit">
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
