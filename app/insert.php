<?php
	// Connect 
	require_once 'model.php';
	$link = open_database_connection();

	// One way of SQL injection prevention
	$safe_name = mysqli_real_escape_string($link, $_POST["InputName"]);
	$safe_email = mysqli_real_escape_string($link, $_POST["InputEmail"]);
	$safe_phone = mysqli_real_escape_string($link, $_POST["InputPhone"]);
	$safe_about = mysqli_real_escape_string($link, $_POST["InputAbout"]);
	// The other way would be to use prepared statements or use PDO

	// Testing PHP email validation. Also using client side html5 validation
	if (filter_var($safe_email, FILTER_VALIDATE_EMAIL) == false){
		echo "Email was not in the correct form! </br>";
		// But we still continue...
	}


	// Check if connection is successful
	if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// SQL Commands
	$sql = "INSERT INTO applicants (name,email,phone,about,rating) VALUES ('$safe_name' , '$safe_email', '$safe_phone', '$safe_about',0) ";

	// Make query and post if error
	if (mysqli_query($link, $sql)){
		echo "Your submission has been received " . $safe_name;
		echo "<br /><a href='app.php'>Go back</a>";
	} else {
		echo "Something went wrong: " . mysqli_error($link);
	}

	mysqli_close($link);
?>