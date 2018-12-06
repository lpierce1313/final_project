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

      // $currUser = (int)$_SESSION['currentUser'];
      // $name = $_POST['name'];
      // $description = $_POST['description'];
      // $due_date = $_POST['due_date'];
      // $urgency = (int)$_POST['urgency'];
      //
      // $query = $conn->prepare("INSERT INTO tasks (user_id, name, description, due_date, urgency) VALUES(?, ?, ?, ?, ?)");
      // $query->bind_param("isssi", $currUser, $name, $description, $due_date, $urgency);
      //
      // if($query->execute()) {
      //   header('Location: tasks.php');
      //   die();
      // } else {
      //   include("create_task.php");
      // }
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
