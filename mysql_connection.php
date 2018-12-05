<?php
    $user = "root";
    $password = "";
    $db = "csci445_final";
    if(file_exists('matt.php'))
    include 'matt.php';
    $conn = new mysqli("localhost", $user, $password, $db) or die("You are not connected");

    session_start();

    function loggedIn() {
    	return isset($_SESSION['currentUser']);
    }
?>
