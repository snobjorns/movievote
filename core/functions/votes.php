<?php
 function register_votes($votes,$nightid,$uname){
	foreach($votes as $movieid => $vote){
		global $user_data;
		print_r($votes);
		$votevalue = $user_data['star'] * $vote; 
		mysql_query("INSERT INTO votes (night_id,movie_id,voter,vote,votevalue) VALUES ($nightid $movieid $uname $vote $votevalue)");  
		mysql_query("UPDATE movies SET (vote = votes + $vote , votevalue = votevalue + $votevalue) WHERE movieid = $movieid");
	
	} 
 }
 
 
 ?>