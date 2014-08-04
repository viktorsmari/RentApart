<?php 
	require_once 'model.php';
	
	delete_applicant($_GET["id"]);

	header('Location: list.php?msg=Deleted successfully');
 ?>