<?php
	// Load Twig template engine
	require_once '../vendor/autoload.php';

	// Load model connection with the database
	//require_once 'model.php';

	// Tell Twig where templates are stored:
	$loader = new Twig_Loader_Filesystem('../views/'); 
	$twig = new Twig_Environment($loader); 

		
	// Hardcoded array 
	// TODO: create houses table in database.
	// Create a function in model.php get_all_houses

	$apartment = array(
		'city' => 'Reykjavik',
		'areacode' => '101',
		'street' => 'Njalsgata',
		'size' => '80',
		'price' => '170.000',
		'availdate' => '2014-09-01',
	);

	echo $twig->render('rentinfo.html', $apartment); 
	echo $twig->render('form.html'); 
?>