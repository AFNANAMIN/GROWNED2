

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js"></script>

<?php

require_once('db-config.php');

echo "hello";
	


   
$lng =json_decode($_POST["lg_arr"]);
$lat=json_decode($_POST["lt_arr"]);
$type=json_decode($_POST["type_arr"]);
$len=json_decode($_POST["i"]);

echo "lng=".$lng;

   
	for($i=0; $i<$len; $i++)
	{
		echo $lng[$i];
	mysqli_query($con,"INSERT INTO 'tree' ('tree_id', 'tree_lng' , 'tree_lat') 
	VALUES (NULL, '$lng[$i]' , '$lat[$i]' ")
	or die(mysqli_error($con)); 
}

	//echo "INSERT INTO `tree` (`tree_id`, `tree_lng`, `tree_lat`, `username`, `email`, `tree_place`) VALUES (NULL, '$lng', '$lat', '$username', '$email','$add')";
?>



