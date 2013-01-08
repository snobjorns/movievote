 <?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';

if(isset($_GET['username']) === true && empty($_GET['username']) === false){
	$username = $_GET['username'];
	if(user_exist($username) === true){
	$uid = uid_from_uname($username);
	$profile_data = user_data($uid, 'name', 'email','star','attends','penalties');
	
	?>
	<h2><?php echo $profile_data['name'];?>`s profile </h2>
	<ul>
		<li>
		Attends: <?php echo $profile_data['attends']; ?>
		</li>
		<li>
		Penalties: <?php echo $profile_data['penalties']; ?>
		</li>
		<li>
		Star: <?php echo $profile_data['star']; ?>
		</li>
	</ul>
	<?php
	
	}
	
	
} 


include 'includes/overall/overall_foot.php';

?>

 
