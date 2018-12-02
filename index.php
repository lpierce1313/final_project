<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
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
        <h1 class="is-size-3">Why you should join? <i class="fa fa-check" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6"> View Statistics about your tasks, view a calender displaying various tasks, and mark your tasks as completed to feel accomplished</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Create an Account <i class="fa fa-user-circle tealColor" aria-hidden="true"></i></h1>
        <br>
        <p class="is-size-6">To create an account, click <a href="./signup">here</a></p>
        <br><br><br>
        <hr>

      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
