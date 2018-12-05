<?php
	
	include("mysql_connection.php");

	if(loggedIn()) {
		header("Location: index.php");
		die();
	}

	if(isset($_GET['token'])) {
		$query = $conn->prepare("SELECT id FROM users WHERE activation_token=?");
		$query->bind_param("s", $_GET['token']);
		$query->execute();
		$result = $query->get_result();

		if($result->num_rows > 0) {
			$userId = $result->fetch_assoc()['id'];

			$updateQuery = $conn->prepare("UPDATE users SET activation_token=0 WHERE id=?");
			$updateQuery->bind_param("s", $userId);
			$updateQuery->execute();			
		}
	}
	header("Location: index.php");
?>
