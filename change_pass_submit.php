<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {
    
    $password = hash('sha256', $_POST['password']);
    // Perform validations
    $insertQuery = $conn->prepare("UPDATE users SET password=? where id=?");
    $insertQuery->bind_param("si", $password, $_POST["info"]);
    if($insertQuery->execute()) {
      header('Location: index.php');
    } else{
      echo "<html>Error changing password</html>";
    }
  }
?>
