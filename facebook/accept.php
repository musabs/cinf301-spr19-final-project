<?php
	include("config.php");
	$rec_id = $_GET['rec_id'];
	mysqli_query($a,"update friend_request set status ='1' where sender_id = '$rec_id'")or die(mysqli_error($a));
	$record = mysqli_query($a,"SELECT * FROM `friend_request` WHERE `sender_id` ='$rec_id'")or die(mysqli_error($a));
	$row = mysqli_fetch_array($record);
	$sender_id = $row['sender_id'];
	$receiver_id = $row['receiver_id'];
	$status = $row['status'];
	mysqli_query($a,"insert into friends (`sender_id`,`receiver_id`,`status`)values('$sender_id','$receiver_id','$status')")or die(mysqli_error($a));
	//header("location:notification.php");
?>