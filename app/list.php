<?php
	require_once '../vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('../views/'); 
	$twig = new Twig_Environment($loader); 

	// For debugging, watching log with 'tail -f /tmp/php.log'
	error_reporting(E_ALL);

	require_once 'model.php';
	$applicants = get_all_applicants();


	echo $twig->render('list.html', array('applicants' => $applicants )); 

?>