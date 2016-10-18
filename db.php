<?php
	
	$conn = mysqli_connect('localhost','root','','travel');

	if($conn){
		//echo 'connected!';
	}else{
		echo "Something goes wrong";
	}