<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

  include_once("mysql_connection.php");

  if(loggedIn()) {
    header("Location: index.php");
    die();
  }

  if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    // Perform validations

    // Check if email already exists
    $query = $conn->prepare("SELECT email FROM users WHERE email=?");
    $query->bind_param("s", $email);
    $query->execute();
    $emailResult = $query->get_result();

    if($emailResult->num_rows > 0) {
      $error = "Email already registered.";
      include("signup.php");
      die();
    }

    $activation_token = hash('md5', $email . time());

    $insertQuery = $conn->prepare("INSERT INTO users (email, first_name, last_name, password, activation_token) VALUES(?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssss", $email, $fname, $lname, $password, $activation_token);

    if($insertQuery->execute()) {
      $message = "Hello " . $fname . ". Please click the following link to activate your account:";
      $base = "http://localhost/csci445/final_project/";
      if(file_exists('cred.php')){
        include 'cred.php';
      }
      $message .= $base . "activate.php?token=" . $activation_token;
      mail($email, "CSCI445 Sign up email", $message);
      header('Location: index.php');

    } else{
      $error = "Error Creating your user";
    }
  }
  // Show sign up page w/ errors
  include("signup.php");
?>
