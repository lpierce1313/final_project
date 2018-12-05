<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {
    $password = hash('sha256', $_POST['password']);

    echo $password;
    echo "\r\n";
    echo $_POST["id"];
    // Perform validations
    $insertQuery = $conn->prepare("UPDATE users SET password=? where id=?");
    $insertQuery->bind_param("si", $password, $_POST["id"]);

    // if($insertQuery->execute()) {
    //   header('Location: index.php');
    //   die();
    // }
  }
  // Show sign up page w/ errors
  include("signup.php");
?>
