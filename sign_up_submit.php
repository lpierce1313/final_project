<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    // Perform validations

    $insertQuery = $conn->prepare("INSERT INTO users (email, first_name, last_name, password) VALUES(?, ?, ?, ?)");
    $insertQuery->bind_param("ssss", $email, $fname, $lname, $password);
    
    if($insertQuery->execute()) {
      header('Location: index.php');
      die();
    }
  }
  // Show sign up page w/ errors
  include("signup.php");
?>