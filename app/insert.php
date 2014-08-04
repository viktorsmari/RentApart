<?php
	// Connect 
	require_once 'model.php';
	create_new_applicant($_POST["InputName"], $_POST["InputEmail"], $_POST["InputPhone"], $_POST["InputAbout"]);
	
?>