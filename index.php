
<?php 
include 'core/init.php';
include 'includes/overall/overall_head.php';


$nightid = latest_night_id();
$data = get_night_data($nightid);
$nighttime = datehour_to_time($data['nightdate'],$data['nighttime']);
?>                                   


		
<?php  
check_if_voted(1,1);
      echo "<h1>Next movienight has the theme <a href = poll.php?id=".$data['nightid'].">".$data['theme']."</a></h1>";
	  
	  echo "<p>Polls closes in ". round((datehour_to_time($data['nightdate'],"20:00:00")-24*60*60 - $time)/60/60,2) .  " hours<p>";	  
	  //echo "<p>Polls closes in ".round(($nighttime - $time) /60/60,2)  ." hours<p>";
include 'includes/overall/overall_foot.php';?>
