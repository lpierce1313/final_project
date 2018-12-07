<?php
  include_once("mysql_connection.php");

  if (loggedIn()) {
      header("Location: index.php");
      die();
  }
  $email = $_POST['email'];
  $password = hash('sha256', $_POST['password']);

  $query = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
  $query->bind_param("ss", $email, $password);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();
      if (strlen($user['activation_token']) == 1) {
          $_SESSION['currentUser'] = $user['id'];
          $_SESSION['loginTime'] = time();
          header("Location: index.php");
          die();
      } else {
          $error = "Please activate your account.";
      }
  } else {
      $error = "Invalid email or password.";
  }

  include("login.php");
