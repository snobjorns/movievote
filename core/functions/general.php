 <?php
 function sanitize($data) {
	return mysql_real_escape_string($data);
 }
 
 function array_sanitize(&$item){
	$item = mysql_real_escape_string($item);
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
 
 
 ?>