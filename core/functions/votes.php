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
 
 function calc_star($n, $p){
	 return (1+log10(2*$n+1))/(2^(($p/($n+1))));
 }
 
 function confirm_att($array,$nightid){
	$unames =array_keys($array);
	
	foreach ($array as $uname => $status){
		mysql_query("UPDATE votes SET status = $status WHERE voter = '$uname' AND night_id = $nightid ");
		if ($status == 1){
			mysql_query("UPDATE users SET attends = attends + 1 WHERE uname = '$uname'");
		} else {
			mysql_query("UPDATE users SET penalties = penalties + 1 WHERE uname = '$uname'");
		}
		$query = mysql_query("SELECT attends, penalties FROM users WHERE uname = '$uname'");
		$result = mysql_fetch_array($query,MYSQL_ASSOC);
		$star = calc_star($result['attends'],$result['penalties']);
		mysql_query("UPDATE users SET star = $star WHERE uname = '$uname'");
	}
	
	header("Location: confirmattendance.php?success");
	exit();
	
 }
 
 function check_if_voted($uname,$nightid){
	$query = mysql_query("SELECT COUNT('voteid') FROM votes WHERE voter = $uname AND night_id = $nightid ");
 
		return(mysql_result($query,0 ) > 0) ? true : false;
 }
 
 ?>
