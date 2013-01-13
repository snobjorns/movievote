 
<?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';
protect_page();
is_admin();

?>


	  
		

<?php 

if (empty($_GET)){

	echo "<h1>Choose movie night</h1>";
	
	echo "<ul>";
	for ($count = 1; $count <= latest_night_id(); $count++ ){
		$data = get_night_data($count);
		echo "<li>". $data['nightdate']." <a href='confirmattendance.php?id=". (string)$count ."'>" .$data['theme']. "</a> </li>";
	}	
	echo "</ul>";
		
	/*view info about Movie night*/
} else{
	if(isset($_GET['success'])){
		echo "Attendees confirmed";
	
	}else if(empty($_POST) == true){

		$nightid = $_GET['id'];
		$night = get_night_data($nightid); 
		$att = get_participants($nightid);
		$uid =array();	
		echo "<h2>".$night['theme'].", ".$night['nightdate']."</h2>";
		echo "<p>Select participants</p>";
		echo "<form action='' method='POST'> ";
		echo "<table>";
		echo "<tr><td>Username</td><td>Not attended</td><td>Attended</td></tr>";
		foreach($att as  $uname){		
		
			echo "<tr><td>".$uname."</td><td><input type ='radio' name = '".$uname."' value = '0' ></td><td><input type ='radio' name = '".$uname."' value = '1' ></td></tr>";
		}
		
		
		echo "</table>";
		echo "<input type='hidden' name ='nightid' value='". $nightid ."' > ";
		echo "<input type='submit' value='Confirm' > ";
		echo "</form>";
		
	} else {
			if((count($_POST) > 1) == true){
				print_r($_POST);
				$night_id = array_pop($_POST); 
				confirm_att($_POST,$night_id);
			}else{
			echo "<p>No users selected</p>";
			}
	
	
	}
}


include 'includes/overall/overall_foot.php';?>



