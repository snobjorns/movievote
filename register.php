 <?php 
 include 'core/init.php';
 include 'includes/overall/overall_head.php';
 ?>

      <h1>Register</h1>
	  <form action="" method="POST">
	  

		<ul>
			<li>
			Username: <br>
			<input type="text" name="username">
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
<?php include 'includes/overall/overall_foot.php';?>