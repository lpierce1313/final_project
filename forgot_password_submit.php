<?php
  include("mysql_connection.php");
  print_r($_POST);

  $email = $_POST['email'];
  $query = $conn->prepare("SELECT * FROM users WHERE email=?");
  $query->bind_param("s", $email);
  $query->execute();
  $result = $query->get_result();

  if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $found = 1;
  } else {
    $error = "Invalid email or password";
    $found = 0;
  }

  if($found == 1){

    $token = hash('sha256', time());
    $base = "http://localhost/csci445/final_project/";
    if(file_exists('cred.php')){
      include 'cred.php';
    }
    $url = $base . "/change_pass.php" . "/?token=" . $token;
    echo $url;
    $to = $user['email'];
    $subject = "Forgot Password";
    $message = "Please click the following link to recover your password" . "\r\n" . $url;

    mail ($to, $subject, $message);

    $query = $conn->prepare("INSERT INTO user_forgotten_password (token, user_id, email) VALUES(?, ?, ?)");
    $query->bind_param("sis", $token, $user['id'], $user['email']);
    $query->execute();
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
            <p class="has-text-info">Email has been sent if recovery email exists. </p> <br>
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
