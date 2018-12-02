<?php
  include("mysql_connection.php");

  $email = $_POST['email'];
  $password = hash('sha256', $_POST['password']);

  $query = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
  $query->bind_param("ss", $email, $password);
  $query->execute();
  $result = $query->get_result();

  if($result->num_rows == 1) {
    echo "SUCCESS<br/>";
    $user = $result->fetch_assoc();
    print_r($user);
    $_SESSION['currentUser'] = $user['id'];
    header("Location: index.php");
  } else {
    $error = "Invalid email or password";
  }

  include("login.php");
?>