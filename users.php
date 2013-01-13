
<?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';
protect_page();


$users = list_users();


?>

      <h1>Users</h1>
     		
<?php

echo "<table>";
echo "<tr><td width = '100px'>Username</td><td>Star value</td></tr>";
foreach ($users as $user => $star){
	echo "<tr><td><a href = 'profile.php?username=".$user."'>". $user ."</a></td>  <td>". $star."</td></tr>";

}
echo "</table>";



 include 'includes/overall/overall_foot.php';?>
