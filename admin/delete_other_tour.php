<?php ob_start();?>
<?php
		$url 		= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  	= parse_url($url, PHP_URL_QUERY);
		$tour_id 	= substr($parse,0);
		//echo $post_id;
		include '..//db.php';


	$query1 = "DELETE FROM other_tours WHERE id = '$tour_id'";
	$run1   = mysqli_query($conn,$query1);
	header('Location: admin_other_tours.php');

?>
