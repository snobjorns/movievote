 <?php
 
 function latest_night_id(){
	$query = mysql_query("SELECT MAX(nightid) from movies");
	
	return mysql_result($query, 0);
 
 }

function add_movie($mdata){
	array_walk($mdata, 'array_sanitize');
	print_r($mdata);
	$data = "'" . implode("','", $mdata)."'";
	$fields =  implode(",",array_keys($mdata));
	mysql_query("INSERT INTO movies ($fields) VALUES ($data)");
	//header("Location: makenight.php?success");
	echo "INSERT INTO movies ($fields) VALUES ($data)";
	return true;
	
} 
 ?>