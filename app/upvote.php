<?php 
	require_once 'model.php';
	$link = open_database_connection();

	$safe_id = mysqli_real_escape_string($link, $_GET["id"]);
	upvote_by_id($safe_id);

	header('Location: list.php?msg=Upvoted successfully');
 ?>