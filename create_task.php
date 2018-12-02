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
        <div class="has-text-centered">
          <h1 class="is-size-3">Create New Task</h1>
          <h3 class="is-size-4">lpierce1313@gmail.com</h3>
          <br> <br> <br>
        </div>
        <div class="form_holder">
          <form class="" action="create_task_submit.php" method="post">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Due date</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="date" placeholder="Email">
                    <span class="icon is-small is-left">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label class="label">Description</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Urgency</label>
                  <div class="control">
                    <div class="select">
                      <select class="fullWidth">
                        <option>Unimportant</option>
                        <option>Important</option>
                        <option>Critical</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input class="button is-primary signup_button" type="submit" title="submit">
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
