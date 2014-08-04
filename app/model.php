<?php
	// THIS CODE IS BASED ON SYMFONY TUTORIAL

	function open_database_connection(){
		$link = mysqli_connect('localhost', 'rentmaster', 'rentmaster', 'rent' );
		// mysql_select_db('rent', $link);

		return $link;
	}

	function close_database_connection($link){
		mysqli_close($link);
	}

	function get_all_applicants(){

		$link = open_database_connection();
		$result = mysqli_query($link, 'SELECT id,name,email,phone,about,rating FROM applicants order by rating desc');

		$posts = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$posts[] = $row;
		}

		close_database_connection($link);

		return $posts;
	}

	function get_applicant_by_id($id){
		$link = open_database_connection();
		$query = 'SELECT name, email,phone, about FROM applicants where id = '.$id;

		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		close_database_connection($link);

		return $row;
	}

	function upvote_by_id($id){
		$link = open_database_connection();
		$query = 'UPDATE applicants SET rating = rating + 1 WHERE id = '.$id;
		$result = mysqli_query($link, $query);
		close_database_connection($link);
	}

	function downvote_by_id($id){
		$link = open_database_connection();
		$query = 'UPDATE applicants SET rating = rating - 1 WHERE id = '.$id;
		$result = mysqli_query($link, $query);
		close_database_connection($link);
	}
?>