<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    // Perform validations

    $activation_token = hash('md5', $email . time());

    $insertQuery = $conn->prepare("INSERT INTO users (email, first_name, last_name, password, activation_token) VALUES(?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssss", $email, $fname, $lname, $password, $activation_token);
    
    if($insertQuery->execute()) {
      $message = "Hello " . $fname . ". Please click the following link to activate your account:";
      $message .= "http://localhost/csci445/final_project/activate.php?token=" . $activation_token;
      mail($email, "CSCI445 Sign up email", $message);
      header('Location: index.php');
      die();
    }
  }
  // Show sign up page w/ errors
  include("signup.php");
?>