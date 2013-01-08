 <?php
 	include 'core/init.php';

	
	
	
	if (empty($_POST) === false){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (empty($username) || empty($password)) {
		$errors[] = 'Please enter username and password';
		
		} else if (user_exist($username) === false ){
			$errors[] = 'User not found';
		} else {
			$login = login($username, $password);
			if($login === false){
				$errors[] = "Wrong password";
			} else {
				$_SESSION['uid'] = $login;
				header('Location: index.php');
				exit();

			}
		}
		
		
	
	} else {
		header('Location: index.php');
	}
	
	;
	
	include 'includes/overall/overall_head.php';
	if (empty($errors)=== false){
		echo '<h2>Login Failed</h2>';
		echo output_errors($errors);
	}
	
	include 'includes/overall/overall_foot.php';

	
?>