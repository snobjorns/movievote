 
<?php 
include 'core/init.php';
protect_page();
protect_page_admin($user_data['uname'], $admins);
include 'includes/overall/overall_head.php';
$nextid = latest_night_id() + 1; 


if (empty($_POST)=== false){



}
?>

      <h1>Create movie night</h1>
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
<?php include 'includes/overall/overall_foot.php';?>
