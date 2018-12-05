<?php
    $user = "root";
    $pass = "";
    $db = "csci445_final";
    if(file_exists('cred.php')){
      include 'cred.php';
    }
    $conn = new mysqli("localhost", $user, $pass, $db) or die("You are not connected");

    session_start();

    function loggedIn() {
    	return isset($_SESSION['currentUser']) && isset($_SESSION['loginTime']);
    }

    // Log out the current user if their session expires
    $MAX_SESSION_TIME = 60*60;
    if(loggedIn()) {
    	if(time() - (int)$_SESSION['loginTime'] > $MAX_SESSION_TIME) {
    		header("Location: logout.php");
    	}
    }
?>
