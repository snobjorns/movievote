 <?php
 function user_data($uid){
	$data = array();
	$uid = (int)$uid;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){
		unset($func_get_args[0]);
		$fields =implode(",", $func_get_args);
		$data = mysql_query("SELECT $fields FROM users WHERE uid = '$uid' ");
		$data2 = mysql_fetch_assoc($data);
		return $data2;
	}	
	//print $fields;
	
}

 
 function logged_in() {
	return(isset($_SESSION['uid']) ? true : false);
 }
 
 function user_exist($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT('uid') FROM users WHERE uname = '$username' ");

	return (mysql_result($query, 0) == 1) ? TRUE : FALSE;
 }
 
 function uid_from_uname($username){
 	$username = sanitize($username);
	$query = mysql_query("SELECT uid FROM users WHERE uname = '$username'");
	return mysql_result($query,0,'uid');
 
 }
 
 function login($username, $password){
	$uid = uid_from_uname($username);
	$username = sanitize($username);
	$password = md5($password);
	print $uid;
	print $password;
	$query = mysql_query("SELECT COUNT('uid') FROM users WHERE uname = '$username' AND password = '$password'" ); 
	
	return(mysql_result($query,0 ) == 1) ? $uid : false;
 }
 ?>