 <?php

 
 
 
 function user_count(){
	$query = mysql_query("SELECT COUNT('uid') FROM users WHERE star != 0");
	return mysql_result($query, 0);
 }
 
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

 function bibsys_exists($bibsys){
    $bibsys = sanitize($bibsys);
    $query = mysql_query("SELECT COUNT('bibsys') FROM users WHERE bibsys = '$bibsys' ");
	return (mysql_result($query, 0) == 1) ? TRUE : FALSE;
 
 }

 function is_admin() {
	global $user_data;
	return($user_data['admin'] >= 1 ? true : false);
 }

 
 function user_exist($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT('uid') FROM users WHERE uname = '$username' ");

	return (mysql_result($query, 0) == 1) ? TRUE : FALSE;
 }
 
 function email_exist($email){
	$username = sanitize($email);
	$query = mysql_query("SELECT COUNT('uid') FROM users WHERE email = '$email' ");
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
 
 function register_user($udata){
	array_walk($udata, 'array_sanitize');
	$udata['password'] = md5($udata['password']);
	//print_r($udata);
	$data = "'" . implode("','", $udata)."'";
	$fields =  implode(",",array_keys($udata));
	mysql_query("INSERT INTO users ($fields) VALUES ($data)");
	header("Location: register.php?success");
	exit();
	//echo "INSERT INTO users ($fields) VALUES ($data)";
 }

 function update_user($udata){
     global $user_data;
     $thisuser = $user_data['uname'];
     array_walk($udata, 'array_sanitize');
     foreach ($udata as $key => $link)
     {
             if ($udata[$key] == '')
                     {
                                 unset($udata[$key]);
                                     }
     }
     if(isset($udata['password'])){
	    $udata['password'] = md5($udata['password']);
     }
        //print_r($udata);
	$data = "'" . implode("','", $udata)."'";
    $fields =  implode(",",array_keys($udata));
    foreach($udata as $key => $value) {
        $updates[] = $key ." = ". "'".$value."'";
    
    }
    $insert = implode(",",$updates);
	mysql_query("UPDATE users SET  $insert WHERE uname = '$thisuser'");
	header("Location: changeuser.php?success");
    //exit();
	//echo "UPDATE users SET $insert WHERE uname ='$thisuser'";
 }

 function list_users(){
  
	$users = array();
	$query = mysql_query("SELECT uname,star FROM users ORDER BY star DESC");
	while ($row = mysql_fetch_array($query, MYSQL_BOTH)){ 
		$users[$row['uname']] = $row['star'];
	}
	return $users;
 
 
 }
 
 ?>
