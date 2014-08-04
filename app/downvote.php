<?php 
	require_once 'model.php';

	downvote_by_id($_GET["id"]);

	header('Location: list.php?msg=Downvoted successfully');
 ?>