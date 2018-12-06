<?php
  include("mysql_connection.php");

  if(loggedIn()) {
    header("Location: index.php");
    die();
  }
?>

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
          <h3 class="is-size-4">Please create your account below</h3>
          <br> <br> <br>
        </div>
        <div class="form_holder">
          <form name="signup" class="" action="sign_up_submit.php" method="post" onsubmit="return validateForm()">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input" name="fname" required>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Email</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email" name="email" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input" name="lname" required>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Password</label>
                  <div class="control">
                    <input class="input" type="password" name="password" required>
                  </div>
                </div>
                <p id="password_error"></p>
              </div>
            </div>
            <input class="button is-primary signup_button" type="submit" title="submit" name="submit">
          </form>
          <br> <br> <br>
        </div>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
      <script type="text/javascript">
        function validateForm() {
          var pass = document.forms["signup"]["password"].value;
          if(pass.length < 6){
            $("#password_error").text("Password must be 6 characters or longer");
            $("#password_error").css("color", "red");
            return false;
          }
        }
      </script>
  </body>
</html>
