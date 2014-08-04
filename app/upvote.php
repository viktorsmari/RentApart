<?php 
	require_once 'model.php';
	
	upvote_by_id($_GET["id"]);

	header('Location: list.php?msg=Upvoted successfully');
 ?>