<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../csci445.css" />
  </head>
  <body>
    <?php
      $home = 0;
      include 'header.php';
      $token = $_GET['token'];
      $query = $conn->prepare("SELECT * FROM user_forgotten_password WHERE token=?");
      $query->bind_param("s", $token);
      $query->execute();
      $result = $query->get_result();
      if($result->num_rows > 0) {
        $token = $result->fetch_assoc();
        $user_id = $token['user_id'];
        $found = 1;
      } else {
        $error = "Can't find token";
        $found = 0;
      }

      $query = $conn->prepare("SELECT * FROM users WHERE id=?");
      $query->bind_param("i", $user_id);
      $query->execute();
      $result = $query->get_result();
      if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
      } else {
        $error = "Can't find user";
      }
    ?>
    <hr>
      <section class="center form">
        <?php if($found ==  1){ ?>
            <div class="has-text-centered">
          <h1 class="is-size-3">Change password below</h1>
          <h3 class="is-size-4"><?php echo $user["email"];?></h3>
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
          <form name="pass" action="../change_pass_submit.php" method="post" onsubmit="return validateForm()">
            <div class="field">
              <label class="label">New Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>
            <div class="field">
              <label class="label">Re-enter Password</label>
              <div class="control">
                <input class="input" type="password" name="password_retry">
              </div>
            </div>
            <p id="password_error"></p>
            <p id="password_error2"></p>
            <input style="display:none;"class="input" type="text" name="info" value="<?php echo $user["id"];?>">
            <input class="button is-primary pass_button" type="submit" title="Login" name="submit">
            </div>
          </form>
          <br> <br> <br>
        </div>
        <?php } ?>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  <script type="text/javascript">
    function validateForm() {
      var pass = document.forms["pass"]["password"].value;
      var passRetry = document.forms["pass"]["password_retry"].value;
      console.log(passRetry);
      if(pass.length < 6){
        $("#password_error").text("Password must be 6 characters or longer");
        $("#password_error").css("color", "red");
        return false;
      }
      if(pass != passRetry){
        $("#password_error2").text("Passwords must match");
        $("#password_error2").css("color", "red");
        return false;
      }
    }
  </script>
  </body>
</html>
