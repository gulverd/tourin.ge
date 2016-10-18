<?php
	
	$conn = mysqli_connect('localhost','nika_sql','tirkmeli9','nika_travel');

	if($conn){
		//echo 'connected!';
	}else{
		echo "Something goes wrong";
	}