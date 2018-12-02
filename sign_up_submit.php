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
      <section class="center form">
        <h1>Signup Submit</h1>
      </section>
      <?php
        $users = $conn->prepare("INSERT INTO users (email, first_name, last_name, password) VALUES(?, ?, ?, ?)");
        $users->bind_param("ssss", $_POST['email'], $_POST['first'], $_POST['last'], $_POST['pass']);
        $users->execute();
      ?>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
