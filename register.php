 <?php 
 include 'core/init.php';
 protect_page();
 include 'includes/overall/overall_head.php';
 
 if (empty($_POST)=== false){
	$required = array('uname','password','again','name','email');
	foreach ($_POST as $key=>$value){
		if (empty($value) && in_array($key, $required) ===true){
			$errors[] = "All fields must be filled";
			break 1;
		}	
	}
	if(empty($errors) === true){
		if (user_exist($_POST['uname']) === true){
			$errors[] = "Username '". $_POST['uname'] ."' is taken";
		}
		if(strlen($_POST['password']) < 6) {
			$errors[] = "Minimum password length is 6 characters";
		}
		if ($_POST['password'] !== $_POST['again']) {
			$errors[] = "Passwords do not match";
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
			$errors[] = "Invalid e-mail address";
		}
		if (email_exist($_POST['email'])){
			$errors[] = "E-mail already registered";
		}
	}
 }
 
 ?>

    <h1>Register</h1>
	<?php 
	
	if (isset($_GET['success'])){
	echo "You are now registered";
	} else {
	
	if (empty($_POST) === false && empty($errors) === true ){
		$register_data = array(
		'uname' 	=> $_POST['uname'],
		'password'	=> $_POST['password'],
		'name' 		=> $_POST['name'],
		'email' 	=> $_POST['email']
		);
		register_user($register_data);
		//redirect
		//exit
	} else if (empty($errors) === false ){
		//echo "<h3>Please fix the following errors</h3><br>";
		echo output_errors($errors);		
	}
	?>
	  
	  <form action="" method="POST">
		<ul>
			<li>
			Username: <br>
			<input type="text" name="uname">
			</li>
			<li>
			Password: <br>
			<input type="password" name ="password">
			</li>
			<li>
			Repeat password:<br>
			<input type="password" name ="again">
			</li>
			<li>
			Name: <br> 
			<input type="text" name = "name">
			</li>
			<li>
			Email: <br>
			<input type="text" name ="email">
			</li>
			<li>
			<input type="submit" value = "Register">
			</li>
	  
		</ul>

	  
  	  </form>

<?php 
}

include 'includes/overall/overall_foot.php';?>