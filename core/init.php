<?php
session_start();
//error_reporting(0); 
require 'database/connect.php';
require 'functions/users.php';
require 'functions/movies.php';
require 'functions/general.php';
require 'functions/votes.php';



if (logged_in() === true) {
	$session_user_id = $_SESSION['uid'];
	$user_data = user_data($session_user_id, 'uid','uname','name', 'email','star','attends','penalties','admin');
}
date_default_timezone_set('Europe/Oslo');

$today = date("Y-m-d");

$hour = date("H:i:s");
$time = time();

$errors = array();
?>