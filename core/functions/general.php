 <?php
 function sanitize($data) {
	return htmlentities(mysql_real_escape_string($data));
 }
 
 function array_sanitize(&$item){
	$item = htmlentities(mysql_real_escape_string($item));
 }

 function output_errors($errors) {

	$output = array();
	foreach($errors as $error){
		$output[] = '<li>' . $error.'</li>';
	}
	return '<ul>' . implode('',$output) . '</ul>';

 }

function protect_page(){
	if (logged_in() === false){
		header('Location: protected.php');
		exit(); 
	}
} 
 
 //$user_data[''] and $admins are for some reason not defined here
function protect_page_admin(){
	if (is_admin() == 0){
		header('Location: protected_admin.php');
		exit();
	}
} 

function datehour_to_time($date,$hour){
	$time = strtotime($date ." ". $hour);

	return $time;
}

function day_before($date){
	$time = (strtotime($date) - 60*60*24);

	return $time;
}

function time_to_datehour($time){
	
	$datehour = date("Y-m-d H:i:s",$time);
	
	return $datehour;
}


 
 ?>