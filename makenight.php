
<?php 
include 'core/init.php';
protect_page();
protect_page_admin();
include 'includes/overall/overall_head.php';
$nextid = latest_night_id() + 1; 

?>

      <h1>Create movie night</h1>
		
<?php
	if (isset($_GET['success'])){
	echo "Movie night successfully added";
	} else {
		//NO ERROR CHECKING!
		if (empty($_POST) === false ){


			$movies = array();
			
			$ids = array();
			array_push($ids, $_POST['id1'], $_POST['id2'], $_POST['id3'], $_POST['id4'], $_POST['id5'] );
			foreach($ids as $id){
				if (empty($id) == false){ 
					$omdb = get_omdbapi($id);
					print_r($omdb);
					if($omdb['Response'] == true){
						$movies[] = array(
						'name' 	=> $omdb['Title'],
						'picture'	=> dl_poster($omdb['Poster'],$omdb['imdbID']),
						'imdb' 		=> "http://www.imdb.com/title/" . $omdb['imdbID'],
						'nightid' 	=> $nextid,
						'nightdate' => $_POST['date'],
						'theme'		=> $_POST['theme'],
						'nighttime'	=>$_POST['time']
						);
					}
				}
			}
				/*		$movie_data2 = array(
			'name' 	=> $omdb['Title'],
			'picture'	=> $omdb['Poster'],
			'imdb' 		=> "http://www.imdb.com/title/" . $omdb['imdbID'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme'],
			'nighttime'	=>$_POST['time']
			);
						$movie_data3 = array(
			'name' 	=> $omdb['Title'],
			'picture'	=> $omdb['Poster'],
			'imdb' 		=> "http://www.imdb.com/title/" . $omdb['imdbID'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme'],
			'nighttime'	=>$_POST['time']
			);
						$movie_data4 = array(
			'name' 	=> $omdb['Title'],
			'picture'	=> $omdb['Poster'],
			'imdb' 		=> "http://www.imdb.com/title/" . $omdb['imdbID'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme'],
			'nighttime'	=>$_POST['time']
			);
						$movie_data5 = array(
			'name' 	=> $omdb['Title'],
			'picture'	=> $omdb['Poster'],
			'imdb' 		=> "http://www.imdb.com/title/" . $omdb['imdbID'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme'],
			'nighttime'	=>$_POST['time']
			);
			*/
			
			
			foreach($movies as $movie){
				if (empty($movie['name']) === false){
					add_movie($movie);
				}
			}
			header("Location: makenight.php?success");
						
		} 


?>	  
<script type="text/javascript">



$(document).ready(function(){

	$("#clockpick").clockpick();
});


</script>
	
	<form action="" method ="POST">
	<ul>
	<li>
	<input type="text" name="theme" value = "Theme">
	</li>
	<li>
	<input type="date" name="date" value = "Date">
	</li>
	<li>
	<input name="time" type="text" value = "Time"  id="clockpick">
	</li>
	<li>
	IMDB ID:
	</li>
	<li>
			Movie 1: <input type="text" name="id1" >
	</li>
	<li>
			Movie 2: <input type="text" name="id2" >
	</li>
	<li>
			Movie 3: <input type="text" name="id3" >
	</li>
	<li>
			Movie 4: <input type="text" name="id4" >
	</li>
	<li>
			Movie 5: <input type="text" name="id5" >
	</li>
	<li>
			<input type="submit" value ="Create">

	</li>
	</ul>
	</form>


	<!--
	<form action="" method = "POST">
		<table border="0">
		<tr>
		<td><input type="text" name="theme" value = "Theme"></td>
		<td><input type="date" name="date" value = "Date"></td>
		<td><input name="time" type="text" value = "Time"  id="clockpick"></td>
		</tr>
		<tr>
		<td>Movie</td>
		<td>Image link</td>
		<td>IMDB link</td>
		</tr>
		<tr>
		<td><input type="text" name="1name" ></td>
		<td><input type="text" name="1image"></td>
		<td><input type="text" name="1imdb" ></td>
		</tr>
		<tr>
		<td><input type="text" name="2name" ></td>
		<td><input type="text" name="2image"></td>
		<td><input type="text" name="2imdb" ></td>
		</tr>
		<tr>
		<td><input type="text" name="3name" ></td>
		<td><input type="text" name="3image"></td>
		<td><input type="text" name="3imdb" ></td>
		</tr>
		<tr>
		<td><input type="text" name="4name" ></td>
		<td><input type="text" name="4image"></td>
		<td><input type="text" name="4imdb" ></td>
		</tr>
		<tr>
		<td><input type="text" name="5name" ></td>
		<td><input type="text" name="5image"></td>
		<td><input type="text" name="5imdb" ></td>
		</tr>
		</table>
		<input type="submit" value ="Create">
	</form>

	-->
	<?php 
}
include 'includes/overall/overall_foot.php';

?>
