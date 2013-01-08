 <?php
 
 function latest_night_id(){
	$query = mysql_query("SELECT MAX(nightid) from movies");
	
	return mysql_result($query, 0);
 
 }

function add_movie($name, $image,$imdb,$night_id,$date,$theme){
	exit();

} 
 ?>