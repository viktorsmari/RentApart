<?php
	// One way of SQL injection prevention
	$safe_name = mysql_real_escape_string($_POST["InputName"]);
	$safe_email = mysql_real_escape_string($_POST["InputEmail"]);
	$safe_phone = mysql_real_escape_string($_POST["InputPhone"]);
	$safe_about = mysql_real_escape_string($_POST["InputAbout"]);
	// The other way would be to use prepared statements or use PDO

	// Testing PHP email validation. Also using client side html5 validation
	if (filter_var($safe_email, FILTER_VALIDATE_EMAIL) == false){
		echo "Email was not in the correct form! </br>";
		// But we still continue...
	}

	// Connect 
	$con = mysqli_connect('localhost', 'rentmaster', 'rentmaster', 'rent');

	// Check if connection is successful
	if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// SQL Commands
	$sql = "INSERT INTO applicants (name,email,phone,about,rating) VALUES ('$safe_name' , '$safe_email', '$safe_phone', '$safe_about',0) ";

	// Make query and post if error
	if (mysqli_query($con, $sql)){
		echo "Your submission has been received " . $safe_name;
	} else {
		echo "Something went wrong: " . mysqli_error($con);
	}

	mysqli_close($con);
?>