<?php
	session_start();
	
	if(isset($_SESSION['currentUser'])) {
		unset($_SESSION['currentUser']);
		session_destroy();
		header("Location: login.php");
	} else {
		header("Location: index.php");
	}
?>