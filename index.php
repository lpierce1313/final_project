<?php
  include("mysql_connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  </head>
  <body>
    <?php
      $home = 1;
      include 'header.php';
    ?>
    <hr>
      <section class="form_holder has-text-centered">
        <?php
          if(!loggedIn()) { 
        ?>
        <h1 class="is-size-3">Welcome to Task Manager <i class="fa fa-tasks" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6">Update, Manage, Delete and View tasks so you can complete all of your tasks on time</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Why you should join? <i class="fa fa-check" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6"> View Statistics about your tasks, view a calender displaying various tasks, and mark your tasks as completed to feel accomplished</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Create an Account <i class="fa fa-user-circle tealColor" aria-hidden="true"></i></h1>
        <br>
        <p class="is-size-6">To create an account, click <a href="./signup.php">here</a></p>
        <br><br><br>
        <hr>
        <?php
          } else {
            $currUser = (int)$_SESSION['currentUser'];
            $query = $conn->prepare("SELECT * FROM users WHERE id=?");
            $query->bind_param("i", $currUser);
            $query->execute();
            $user = $query->get_result()->fetch_assoc();

            $numTasksQuery = $conn->prepare("SELECT COUNT(*) AS numTasks FROM tasks WHERE user_id=?");
            $numTasksQuery->bind_param("i", $currUser);
            $numTasksQuery->execute();
            $numTasks = $numTasksQuery->get_result()->fetch_assoc()['numTasks'];

        ?>
        <h1 class="is-size-3">Account Information</h1>
        <p>Name: <?php echo $user['first_name'] . " " . $user['last_name']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Number of Tasks: <?php echo $numTasks; ?></p>
      <?php }?>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
