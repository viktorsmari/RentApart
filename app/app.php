<?php
	// Load Twig template engine
	require_once '../vendor/autoload.php';

	// Load model connection with the database
	// require_once 'model.php';

	// Tell Twig where templates are stored:
	$loader = new Twig_Loader_Filesystem('../views/'); 
	$twig = new Twig_Environment($loader); 

	// $posts = get_all_posts();
	// print_r($posts);
	
	// Hardcoded array, 
	// TODO: create houses table in database.
	$apartment = array(
		'city' => 'Reykjavik',
		'areacode' => '101',
		'street' => 'Njalsgata',
		'size' => '80',
		'price' => '170.000'
	);


	echo $twig->render('rentinfo.html', $apartment); 
	echo $twig->render('form.html'); 
?>