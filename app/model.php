<?php
	// THIS CODE IS BASED ON SYMFONY TUTORIAL

	function open_database_connection(){
		$link = mysql_connect('localhost', 'rentmaster', 'rentmaster' );
		mysql_select_db('rent', $link);

		return $link;
	}

	function close_database_connection($link){
		mysql_close($link);
	}

	function get_all_applicants(){

		$link = open_database_connection();
		$result = mysql_query('SELECT id,name,email,phone,about,rating FROM applicants', $link);

		$posts = array();

		while ($row = mysql_fetch_assoc($result)) {
			$posts[] = $row;
		}

		close_database_connection($link);

		return $posts;
	}

	function get_applicant_by_id($id){
		$link = open_database_connection();
		$query = 'SELECT name, email,phone, about FROM applicants where id = '.$id;

		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		close_database_connection($link);

		return $row;
	}

	function upvote_by_id($id){
		$link = open_database_connection();
		$query = 'UPDATE applicants SET rating = rating + 1 WHERE id = '.$id;
		$result = mysql_query($query);
		close_database_connection($link);
	}

	function downvote_by_id($id){
		$link = open_database_connection();
		$query = 'UPDATE applicants SET rating = rating - 1 WHERE id = '.$id;
		$result = mysql_query($query);
		close_database_connection($link);
	}
?>