<?php
  include("mysql_connection.php");

  $email = $_POST['email'];
  $password = hash('sha256', $_POST['password']);

  $query = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
  $query->bind_param("ss", $email, $password);
  $query->execute();
  $result = $query->get_result();

  if($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    if($user['activation_token'] != 0) {
      $error = "Please activate your account.";
    } else {
      $_SESSION['currentUser'] = $user['id'];
      $_SESSION['loginTime'] = time();
      header("Location: index.php");
    }

  } else {
    $error = "Invalid email or password.";
  }

  include("login.php");
?>