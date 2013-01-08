<?php
session_start();
//error_reporting(0); 
require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

if (logged_in() === true) {
	$session_user_id = $_SESSION['uid'];
	$user_data = user_data($session_user_id, 'uid','uname','name', 'email','star','attends','penalties');
}

$errors = array();
?>