<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {
    $password = hash('sha256', $_POST['password']);

    // Perform validations

    $insertQuery = $conn->prepare("INSERT INTO users (password) VALUES(?)");
    $insertQuery->bind_param("s", $password);
    
    if($insertQuery->execute()) {
      header('Location: index.php');
      die();
    }
  }
  // Show sign up page w/ errors
  include("signup.php");
?>