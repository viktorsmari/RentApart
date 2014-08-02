<?php
	// One way of SQL injection prevention
	$safe_name = mysql_real_escape_string($_POST["InputName"]);
	$safe_email = mysql_real_escape_string($_POST["InputEmail"]);
	$safe_phone = mysql_real_escape_string($_POST["InputPhone"]);
	$safe_about = mysql_real_escape_string($_POST["InputAbout"]);

	// Connect the manual way 
	$con = mysqli_connect('localhost', 'rentmaster', 'rentmaster', 'rent');

	// Check if connection is successful
	if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Commands
	$sql = "INSERT INTO applicants (name,email,phone,about) VALUES ('$safe_name' , '$safe_email', '$safe_phone', '$safe_about') ";

	if (mysqli_query($con, $sql)){
		echo "Your submission has been received " . $safe_name;
	} else {
		echo "Error: " . mysqli_error($con);
	}

	mysqli_close($con);
?>