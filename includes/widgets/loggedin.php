<div class="widget">
    <h2>Logged in as <?php echo $user_data['name']?></h2>

    <div class="inner">
      <ul>
	  <li><a href ="logout.php">Log out</a></li>
	  <li><a href="<?php echo "profile.php?username=".$user_data['uname']; ?>">My Profile</a></li>
	  </ul>
    </div>
</div>
