<?php
  include("mysql_connection.php");

  if(!loggedIn()) {
    header("Location: login.php");
    die();
  }

  if(isset($_POST['submit'])) {
    print_r($_POST);

    $currUser = (int)$_SESSION['currentUser'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $urgency = (int)$_POST['urgency'];

    $query = $conn->prepare("INSERT INTO tasks (user_id, name, description, due_date, urgency) VALUES(?, ?, ?, ?, ?)");
    $query->bind_param("isssi", $currUser, $name, $description, $due_date, $urgency);

    if($query->execute()) {
      header('Location: tasks.php');
      die();
    } else {
      inclide("create_task.php");
    }
  }
?>
