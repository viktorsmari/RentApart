<?php 
	require_once 'model.php';
	$safe_id = mysql_real_escape_string($_GET["id"]);
	downvote_by_id($safe_id);

	header('Location: list.php?msg=Downvoted successfully');
 ?>