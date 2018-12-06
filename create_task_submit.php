<?php
  include("mysql_connection.php");

  if (!loggedIn()) {
      header("Location: login.php");
      die();
  }

  if (isset($_POST['submit'])) {
      $urg = array("Unimportant"=>0,"Important"=>1,"Critical"=>2);

      $currUser = (int)$_SESSION['currentUser'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $due_date = $_POST['due_date'];
      $urgency = $urg[$_POST['urgency']];
      // var_dump($currUser, $name, $description, $due_date, $urgency);
      $query = $conn->prepare("INSERT INTO tasks (user_id, name, description, due_date, urgency, complete) VALUES(?, ?, ?, ?, ?, 0)");
      $query->bind_param("isssi", $currUser, $name, $description, $due_date, $urgency);

      if ($query->execute()) {
          header('Location: tasks.php');
          die();
      } else {
          echo '<script type="text/javascript">function deletePost() {
              window.alert("Something went wrong, please try again.");
              window.location.href = "create_task.php";}
              deletePost();</script>';
      }
  }
