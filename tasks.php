<?php
  include("mysql_connection.php");
  if (!loggedIn()){
    header("Location: login.php");
    die();
  }

  $title = "All Tasks";

  $currUser = (int)($_SESSION['currentUser']);
  $incomplete = $conn->query("SELECT * FROM tasks WHERE user_id = $currUser AND complete=0");
  $complete = $conn->query("SELECT * FROM tasks WHERE user_id = $currUser AND complete=1");
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
      <section class="card_margin">
        <h1 class="has-text-centered is-size-4">Incomplete Tasks</h1>
        <br><br>
        <?php
        if ($incomplete->num_rows > 0) {
            while($row = $incomplete->fetch_assoc()) {
              if($row['complete'] == 1) continue;
        ?>

        <div class="card card_styling">
          <header class="card-header">
            <p class="card-header-title">
              <?php echo $row['name']?>
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fas fa-angle-down" aria-hidden="true"></i>
              </span>
            </a>
          </header>
          <div class="card-content">
            <div class="content">
              <?php echo $row['description']?>
              <br>
              <p>Due date: <?php echo $row['due_date']?></p>
              <br>
              <?php if($row['urgency'] == 0){ ?>
                <p class="has-text-info">Task is Unimportant</p>
              <?php  } else if($row['urgency'] == 1) { ?>
                <p class="has-text-warning">Task is Important</p>
              <?php } else { ?>
                <p class="has-text-danger">Task is Urgent</p>
              <?php } ?>

            </div>
          </div>
          <footer class="card-footer">
            <a href="edit_task.php?action=complete&tid=<?php echo $row['id']; ?>" class="card-footer-item">Complete</a>
            <a href="edit_task.php?action=edit&tid=<?php echo $row['id']; ?>" class="card-footer-item">Edit</a>
            <a href="edit_task.php?action=delete&tid=<?php echo $row['id']; ?>" class="card-footer-item">Delete</a>
          </footer>
        </div>


        <?php    }
        } else {
          echo "You have no incomplete tasks.";
        }
        ?>
      </section>

      <br><br/>

      <section class="card_margin">

        <br><br>
        <?php
        if ($complete->num_rows > 0) {
            echo '<h1 class="has-text-centered is-size-4">Completed Tasks</h1>';

            while($row = $complete->fetch_assoc()) {
              if($row['complete'] == 0) continue;
        ?>
        <div class="card card_styling">
          <header class="card-header">
            <p class="card-header-title">
              <?php echo $row['name']?>
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fas fa-angle-down" aria-hidden="true"></i>
              </span>
            </a>
          </header>
          <div class="card-content">
            <div class="content">
              <?php echo $row['description']?>
              <br>
              <p>Due date: <?php echo $row['due_date']?></p>
              <br>
              <?php if($row['urgency'] == 0){ ?>
                <p class="has-text-info">Task is Unimportant</p>
              <?php  } else if($row['urgency'] == 1) { ?>
                <p class="has-text-warning">Task is Important</p>
              <?php } else { ?>
                <p class="has-text-danger">Task is Urgent</p>
              <?php } ?>

            </div>
          </div>
          <footer class="card-footer">
          </footer>
        </div>


        <?php
          }
        }
        ?>
      </section>
      <br/>

      <?php
        include 'footer.php';
      ?>
  </body>
</html>
