<?php
	include("config.php");
	$rec_id = $_GET['rec_id'];
	mysqli_query($a,"update friend_request set status ='2' where sender_id = '$rec_id'")or die(mysqli_error($a));
	header("location:notification.php");
?>