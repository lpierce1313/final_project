<?php
  include("mysql_connection.php");

  if(!loggedIn()) {
    header("Location: login.php");
    die();
  }

  $currUser = (int)($_SESSION['currentUser']);

  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $urgency = (int)$_POST['urgency'];
    $tid = (int)$_POST['tid'];

    $updateQuery = $conn->prepare("UPDATE tasks SET name=?, description=?, due_date=?, urgency=? WHERE id=? AND user_id=?");
    $updateQuery->bind_param("sssiii", $name, $description, $due_date, $urgency, $tid, $currUser);
    
    if($updateQuery->execute()) {
      header("Location: tasks.php");
      die();
    } else {
      $error = "Failed to update task.";
    }
  }

  else if(isset($_GET['tid'])) {
    $tid = (int)($_GET['tid']);

    $query = $conn->prepare("SELECT * FROM tasks WHERE id=? AND user_id=?");
    $query->bind_param("ii", $tid, $currUser); 
    if($query->execute()) {
      $data = $query->get_result()->fetch_assoc();
      $name = $data['name'];
      $description = $data['description'];
      $due_date = $data['due_date'];
    }
  }
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
      <section class="center form">
        <div class="has-text-centered">
          <h1 class="is-size-3">Create New Task</h1>
          <h3 class="is-size-4"><?php echo isset($error) ? $error : ''; ?></h3>
          <br> <br> <br>
        </div>
        <div class="form_holder">
          <form class="" action="edit_task.php" method="post">
            <input type="hidden" name="tid" value="<?php echo isset($tid) ? $tid : ''; ?>" />

            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Due date</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="date" name="due_date" value="<?php echo isset($due_date) ? $due_date : ''; ?>">
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
                    <input class="input" type="text" placeholder="Text input" name="description" value="<?php echo isset($description) ? $description : ''; ?>">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Urgency</label>
                  <div class="control">
                    <div class="select">
                      <select class="fullWidth" name="urgency">
                        <option>Unimportant</option>
                        <option>Important</option>
                        <option>Critical</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input class="button is-primary signup_button" type="submit" title="submit" name="submit">
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
