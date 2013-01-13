
<?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';

?>


	  
		

<?php 
/*List of active polls*/
if (empty($_GET)){

	echo "<h1>Active polls</h1>";
	
	echo "<ul>";
	for ($count = 1; $count <= latest_night_id(); $count++ ){
		$data = get_night_data($count);
		if ( $time < (datehour_to_time($data['nightdate'],"20:00:00")-24*60*60)) {
			echo "<li>". $data['nightdate']." <a href='poll.php?id=". (string)$count ."'>" .$data['theme']. "</a> </li>";
		}
	}	
	echo "</ul>";
		
	/*When votes is submittes */
} elseif (empty($_POST) ==false){
	$nightid = array_pop($_POST);
	$data = array_unique($_POST);
	if(count($data) == count($_POST) && max($data) < 6){	
		register_votes($data,$nightid,$user_data['uname']);

	}else {
		$errors[] = "Please distribute votes 1 to 5 evenly over all movies"; 
	}
	
	

		/*view info about Movie night*/
}elseif(isset($_GET['id'])){

	$nightid = $_GET['id'];
	$night = get_night_data($nightid); 
	if ($time < (datehour_to_time($night['nightdate'],"20:00:00")-24*60*60) /*&& user has not voted*/) {
		$movies = get_movie_datas($nightid);
		$items = array();
		array_push($items, "picture","name","votes","votevalue");
		
		echo "<h2>".$night['theme'].", ".$night['nightdate']."</h2>";
		if ( $time < (datehour_to_time($night['nightdate'],"20:00:00")-24*60*60)) {
			echo "The polls closes ". time_to_datehour(day_before($night['nightdate'] .'20:00:00')) ." ." ;
		}
		echo "<form action='' method='POST'>";
		echo "<table border = '1'>";
		echo "<tr><td></td><td></td><td>Number of Votes</td></tr>";
		foreach ($movies as $movie){
			echo "<tr>";
			foreach ($items as $item){
				if ($item == 'picture'){
					echo "<td><img src='".$movie[$item]."' class='poster'></td>";
				} elseif ($item == 'name' ) {
					echo "<td><a href='".$movie['imdb']."'>".$movie[$item]."</a></td>";
				} else {
					echo"<td><input type='number' name='". $movie['movieid'] ."' min='1' max='5'> </td>";
					break;
				}
				//print_r($items);
			}
			echo "</tr>";
		}
		echo "</table>";
		echo "<input type='hidden' name='nightid' value='". $nightid ."'>";

		echo "<input type ='submit' value ='VOTE!'>";
	} 
}


include 'includes/overall/overall_foot.php';?>



