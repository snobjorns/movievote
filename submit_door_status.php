<?php 

if(empty($_GET) === false){
	$file = fopen('door/doorstatus.txt','w');
	
	$status = $_GET['door'];
	if($status == 0){
		fwrite($file,'Open');		
	}else{
		fwrite($file,'Closed');
	}
	fclose($file);
}else{
echo '<h1>you should not be here, please go away</h1>';
}
?>
