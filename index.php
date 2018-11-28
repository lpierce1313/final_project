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
      $home = 1;
      include 'header.php';
    ?>
    <hr>
      <section class="form_holder has-text-centered">
        <h1 class="is-size-3">Welcome to Task Manager <i class="fa fa-tasks" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6">Update, Manage, Delete and View tasks so you can complete all of your tasks on time</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Why you should join? <i class="fa fa-superscript" aria-hidden="true" id="taskIcon"> </i></h1>
        <p class="is-size-6"> View Statistics about your tasks, view a calender displaying various tasks, and mark your tasks as completed to feel accomplished</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Create an Account <i class="fa fa-user-circle" aria-hidden="true"></i></h1>
        <br>
        <p class="is-size-6">To create an account, click <a href="./signup">here</a></p>
        <br><br>
        <hr>

      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
