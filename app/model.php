<?php
	// THIS CODE IS BASED ON SYMFONY TUTORIAL

	function open_database_connection(){
		$link = mysqli_connect('localhost', 'rentmaster', 'rentmaster', 'rent' );
			// Check if connection is successful
		if (!$link){
			echo "ERROR";
		}
		if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
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
		$safe_id = mysqli_real_escape_string($link, $id);
		$query = 'UPDATE applicants SET rating = rating + 1 WHERE id = '.$safe_id;
		$result = mysqli_query($link, $query);
		close_database_connection($link);
	}

	function downvote_by_id($id){
		$link = open_database_connection();
		$safe_id = mysqli_real_escape_string($link, $id);
		$query = 'UPDATE applicants SET rating = rating - 1 WHERE id = '.$safe_id;
		$result = mysqli_query($link, $query);
		close_database_connection($link);
	}
	
	function create_new_applicant($name, $email, $phone, $about){
		$link = open_database_connection();
		$safe_name = mysqli_real_escape_string($link, $name );
		$safe_email = mysqli_real_escape_string($link, $email );
		$safe_phone = mysqli_real_escape_string($link, $phone );
		$safe_about = mysqli_real_escape_string($link, $about );

		$sql = "INSERT INTO applicants (name,email,phone,about,rating) 
			VALUES ('$safe_name' , '$safe_email', '$safe_phone', '$safe_about',0) ";

		// Make query and post if error
		if (mysqli_query($link, $sql)){
			echo "Your submission has been received " . $safe_name;
			echo "<br /><a href='app.php'>Go back</a>";
		}else{
			echo "Error: " . mysqli_error($link);
		}
		close_database_connection($link);
	}

	function delete_applicant($id){
		$link = open_database_connection();
		$safe_id = mysqli_real_escape_string($link, $id);
		$query = 'DELETE from applicants where id ='.$safe_id;
		mysqli_query($link,$query);
		close_database_connection($link);
	}
?>