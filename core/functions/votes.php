<?php
 function register_votes($votes,$nightid,$uname){
	
	foreach($votes as $movieid => $vote){
		global $user_data;
		//print_r($votes);
		$votevalue = $user_data['star'] * $vote; 
		mysql_query("INSERT INTO votes (night_id,movie_id,voter,vote,votevalue) VALUES ($nightid, $movieid, '$uname',$vote, $votevalue)");  
		mysql_query("UPDATE movies SET votes = votes + $vote , votevalue = votevalue + $votevalue WHERE movieid = $movieid");
	} 
 }
 
 function get_participants($nightid){
	$query = mysql_query("SELECT voter FROM votes WHERE night_id = $nightid AND status = 0 GROUP BY voter");
	$results = array();
	while($row = mysql_fetch_assoc($query)) {
		$results[] = $row['voter'];
	}
	return $results;
 }
 
 function confirm_att($array,$nightid){
	$unames =array_keys($array);
	$fields = "(voter = '" .implode("' OR voter = '",$unames) . "')";
	mysql_query("UPDATE votes SET status = 1 WHERE $fields AND night_id = $nightid ");

		//change attend/star on users
 }
 
 ?>