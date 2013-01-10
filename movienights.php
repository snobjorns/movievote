
<?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';

?>


	  
		

<?php 

if (empty($_GET)){

	echo "<h1>Previous movie nights</h1>";
	
	echo "<ul>";
	for ($count = 1; $count <= latest_night_id(); $count++ ){
		$data = get_night_data($count);
		echo "<li>". $data['nightdate']." <a href='movienights.php?id=". (string)$count ."'>" .$data['theme']. "</a> </li>";
	}	
	echo "</ul>";
		
	/*view info about Movie night*/
} else {	
	$nightid = $_GET['id'];
	$night = get_night_data($nightid); 
	$movies = get_movie_datas($nightid);
	$items = array();
	array_push($items, "picture","name","votes","votevalue");
	
	echo "<h2>".$night['theme'].", ".$night['nightdate']."</h2>";
	if ( $time < (datehour_to_time($night['nightdate'],"20:00:00")-24*60*60)) {
		echo "You cannot view votes for this movie night because the polls are not closed yet. The polls closes ". time_to_datehour(day_before($night['nightdate'] .'20:00:00')) ." ." ;
	}
	
	echo "<table border = '1'>";
	echo "<tr><td></td><td></td><td>Number of Votes</td><td>Vote value</td></tr>";
	foreach ($movies as $movie){
		echo "<tr>";
		foreach ($items as $item){
			if ($item == 'picture'){
				echo "<td><img src='".$movie[$item]."' class='poster'></td>";
			} elseif ($item == 'name' ) {
				echo "<td><a href='".$movie['imdb']."'>".$movie[$item]."</a></td>";
			} else {
				if ( $time >= (datehour_to_time($night['nightdate'],"20:00:00")-24*60*60)) {
				//if ( $time >= (datehour_to_time("2013-1-13","00:10:00")-24*60*60)) { 					
					echo "<td>".$movie[$item]."</td>";
					
				} else{
					echo "<td> N/A </td>";
				}
			}
			//print_r($items);
		}
		echo "</tr>";
	}
	echo "</table>";
	
}


include 'includes/overall/overall_foot.php';?>



