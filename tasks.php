<?php
  include("mysql_connection.php");
  if (!loggedIn()){
    header("Location: login.php");
    die();
  }
  $currUser = (int)($_SESSION['currentUser']);
  $sql = "SELECT * FROM tasks where user_id = $currUser";
  $result = $conn->query($sql);
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
        <h1 class="has-text-centered is-size-4">Jack Temple</h1>
        <br><br>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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
            <a href="#" class="card-footer-item">Complete</a>
            <a href="#" class="card-footer-item">Edit</a>
            <a href="#" class="card-footer-item">Delete</a>
          </footer>
        </div>


        <?php    }
        } else {
            echo "0 results";
        }
        ?>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
