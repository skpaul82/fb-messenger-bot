<?php 
/**
 * 
 * Lets loads FbMessengerBot class and communicate wiht Facebook Messenger
 * @author skpaul82 <hello@skpaul.me>
 * 
 */

// include FbMessengerBot class
require_once('Controller/FbMessengerBot.php');
	
	// store HTTP Request variables
	// An associative array that by default contains the contents of $_GET, $_POST and $_COOKIE.
	$request = $_REQUEST;
	// dd($request, 0);
	// make a instance of FbMessengerBot class
	$bot = new FbMessengerBot;



	// call index function
	$bot->index($request);
	// $input = json_decode(file_get_contents('php://input'), true);
	// dd($input, 0);