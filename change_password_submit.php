<?php
  include("mysql_connection.php");

  if(isset($_POST['submit'])) {

    $currPass = $_POST['currPass']; //stored in DB
    $origPass = hash('sha256', $_POST['origPass']); //From input field guessed db password
    $newPass = hash('sha256', $_POST['password']); //Changed password

    if($currPass == $origPass){
      $insertQuery = $conn->prepare("UPDATE users SET password=? where id=?");
      $insertQuery->bind_param("si", $newPass, $_POST["id"]);
      if($insertQuery->execute()) {
        header('Location: index.php');
      }
    }
    else{
      header('Location: change_password.php?flag=1');
    }
  }
?>
