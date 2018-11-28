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
      <section class="form_holder_login has-text-centered">
        <h1 class="is-size-3">Account Information</h1>
        <br> <br> <br>
        <div class="is-size-5">
            <div class="columns">
              <div class="column">
                <p>Name:</p>
                <p>Email:</p>
                <p>Created Tasks:</p>
                <p>Number of uncompleted Tasks:</p>
                <p>Account Created on:</p>
              </div>
              <div class="column">
                <p>Luke Pierce</p>
                <p>lpierce1313@gmail.com</p>
                <p>52</p>
                <p>20</p>
                <p>08/31/18</p>
              </div>
            </div>
        </div>
      </section>
      <br> <br> <br> <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
