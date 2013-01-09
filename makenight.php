
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
			$movie_data1 = array(
			'name' 	=> $_POST['1name'],
			'picture'	=> $_POST['1image'],
			'imdb' 		=> $_POST['1imdb'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme']
			);
						$movie_data2 = array(
			'name' 	=> $_POST['2name'],
			'picture'	=> $_POST['2image'],
			'imdb' 		=> $_POST['2imdb'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme']
			);
						$movie_data3 = array(
			'name' 	=> $_POST['3name'],
			'picture'	=> $_POST['3image'],
			'imdb' 		=> $_POST['3imdb'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme']
			);
						$movie_data4 = array(
			'name' 	=> $_POST['4name'],
			'picture'	=> $_POST['4image'],
			'imdb' 		=> $_POST['4imdb'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme']
			);
						$movie_data5 = array(
			'name' 	=> $_POST['5name'],
			'picture'	=> $_POST['5image'],
			'imdb' 		=> $_POST['5imdb'],
			'nightid' 	=> $nextid,
			'nightdate' => $_POST['date'],
			'theme'		=> $_POST['theme']
			);
			
			
			
			add_movie($movie_data1);
			add_movie($movie_data2);
			add_movie($movie_data3);
			add_movie($movie_data4);
			add_movie($movie_data5);
			
			header("Location: makenight.php?success");
						
		} 


?>	  

	
	<form action="" method = "POST">
		<table border="0">
		<tr>
		<td><input type="text" name="theme" value = "Theme"></td>
		<td><input type="date" name="date" value = "Date"></td>
		</tr>
		<tr>
		<td>Movie name</td>
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
<?php 
}
include 'includes/overall/overall_foot.php';

?>
