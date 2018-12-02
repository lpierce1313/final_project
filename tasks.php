<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="csci445.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Task Manager</title> <!-- Title of the Website -->
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
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);
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
