<?php
  include("mysql_connection.php");

  if (!loggedIn()){
    header("Location: login.php");
    die();
  }
  $title = "All Tasks";

  $currUser = (int)($_SESSION['currentUser']);
  $query = $conn->prepare("SELECT * FROM users WHERE id=?");
  $query->bind_param("i", $currUser);
  $query->execute();
  $result = $query->get_result();
  if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
  } else {
    $error = "Invalid email or password";
  }
  $currPass = $user['password'];
  $flag = 0;
  if(isset($_GET['flag'])){
    $flag = $_GET['flag'];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
    <script src='forge-sha256.min.js'></script>
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
          <h3 class="is-size-4"><?php echo $user['email'];?></h3>
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
          <form name="pass" action="change_password_submit.php" method="post" onsubmit="return validateForm()">
            <div class="field">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="origPass">
              </div>
            </div>
            <?php if($flag == 1){ ?>
              <p id="password" class="has-text-danger">Password does not match original</p>
            <?php }?>
            <div class="field">
              <label class="label">New Password</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>
            <p id="password_error"></p>
            <div class="field">
              <label class="label">Re-enter Password</label>
              <div class="control">
                <input class="input" type="password" name="password_retry">
              </div>
            </div>
            <input style="display:none;"class="input" type="text" name="currPass" value="<?php echo $currPass;?>">
            <input style="display:none;"class="input" type="text" name="id" value="<?php echo $currUser;?>">
            <p id="password_error2"></p>
            <input class="button is-primary pass_button" type="submit" title="Login" name="submit">
            </div>
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
          var pass = document.forms["pass"]["password"].value;
          var passRetry = document.forms["pass"]["password_retry"].value;
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
