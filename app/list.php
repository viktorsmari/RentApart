<?php
	require_once '../vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('../views/'); 
	$twig = new Twig_Environment($loader); 

	// For debugging, watching log with 'tail -f /tmp/php.log'
	error_reporting(E_ALL);

	require_once 'model.php';
	$posts = get_all_posts();

	// Using old PHP method. 
/*
	echo "<table style='width:500px' border='1'>";
	echo "<thead><tr><th>Name</th><th>Phone</th><th>About</th></tr></thead>";
	foreach ($posts as $value) {
		echo '<tr><td><a href=mailto:'.$value['email'].'>' . $value["name"]. '</a> '  . " </td>";
		echo "<td>" . $value['phone'] . "</td>";
		echo "<td>" . $value['about'] . "</td></tr>";
		$numb++;
	}
	echo "</table>";
	echo "Number of applicants so far: " . $numb . "<br/>";
*/

	echo $twig->render('list.html', array('posts' => $posts )); 

?>